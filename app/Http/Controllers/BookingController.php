<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use App\Mail\BookingHotelMail;
use App\Mail\BookingGuestMail;

class BookingController extends Controller
{
    /**
     * Matrix ya bei kulingana na picha uliyotuma (Tunatumia RR - Rack Rates kwa website)
     */
    private function getPricingMatrix(): array
    {
        return [
            'low' => [
                1 => ['BB' => 50,  'HB' => 60,  'FB' => 70],   // Standard Double
                2 => ['BB' => 80,  'HB' => 95,  'FB' => 110],  // Standard Triple
                3 => ['BB' => 100, 'HB' => 120, 'FB' => 140],  // Standard Family
            ],
            'high' => [
                1 => ['BB' => 80,  'HB' => 85,  'FB' => 95],   // Standard Double
                2 => ['BB' => 110, 'HB' => 120, 'FB' => 125],  // Standard Triple
                3 => ['BB' => 140, 'HB' => 150, 'FB' => 160],  // Standard Family
            ]
        ];
    }

    private function getRooms()
    {
        // Kwa ajili ya ku-display bei za msingi (BB) kwenye page ya vyumba
        $matrix = $this->getPricingMatrix();

        return [
            1 => [
                'id'         => 1,
                'name'       => 'Standard Double Room',
                'image'      => asset('images/rooms/standard-double/main.jpg'),
                'low_price'  => $matrix['low'][1]['BB'],
                'high_price' => $matrix['high'][1]['BB'],
                'features'   => '1 Queen/King Bed • Free Wi-Fi • Hot Shower • Breakfast Included',
            ],
            2 => [
                'id'         => 2,
                'name'       => 'Standard Triple Room',
                'image'      => asset('images/rooms/standard-triple/main.jpg'),
                'low_price'  => $matrix['low'][2]['BB'],
                'high_price' => $matrix['high'][2]['BB'],
                'features'   => '1 Double & 1 Single Bed • Free Wi-Fi • En-suite Bathroom • Breakfast Included',
            ],
            3 => [
                'id'         => 3,
                'name'       => 'Standard Family Room',
                'image'      => asset('images/rooms/standard-family/main.jpg'),
                'low_price'  => $matrix['low'][3]['BB'],
                'high_price' => $matrix['high'][3]['BB'],
                'features'   => '2 Double Beds • Free Wi-Fi • Spacious ~45 m² • Breakfast Included',
            ],
        ];
    }

    public function availability(Request $request)
    {
        $request->validate([
            'checkin'  => 'required|date|after_or_equal:today',
            'checkout' => 'required|date|after:checkin',
            'guests'   => 'required|string',
        ]);

        $checkin  = Carbon::parse($request->checkin);
        $checkout = Carbon::parse($request->checkout);
        $nights   = $checkin->diffInDays($checkout);
        $rooms    = $this->getRooms();

        foreach ($rooms as &$room) {
            $totalPrice  = 0;
            $currentDate = $checkin->copy();
            while ($currentDate->lt($checkout)) {
                $totalPrice += $this->checkIfHighSeason($currentDate) ? $room['high_price'] : $room['low_price'];
                $currentDate->addDay();
            }
            $room['total_price']         = $totalPrice;
            $room['avg_price_per_night'] = round($totalPrice / $nights, 2);
        }

        return view('availability', [
            'rooms'    => $rooms,
            'checkin'  => $checkin->format('d M Y'),
            'checkout' => $checkout->format('d M Y'),
            'nights'   => $nights,
            'guests'   => $request->guests,
        ]);
    }

    public function checkout(Request $request,int $room_id)
    {
        $request->validate([
            'checkin'   => 'required|string',
            'checkout'  => 'required|string',
            'guests'    => 'required|string',
            'meal_plan' => 'nullable|string|in:BB,HB,FB',
            'meal_days' => 'nullable|integer|min:0',
        ]);

        $checkin  = Carbon::parse($request->checkin);
        $checkout = Carbon::parse($request->checkout);
        $nights   = $checkin->diffInDays($checkout);
        $rooms    = $this->getRooms();

        if (!array_key_exists($room_id, $rooms)) {
            return redirect()->back()->with('error', 'Room not found.');
        }

        $room   = $rooms[$room_id];
        $matrix = $this->getPricingMatrix();

        $mealPlan          = $request->input('meal_plan', 'BB');
        $mealDaysRemaining = (int) $request->input('meal_days', 0);
        
        // Piga hesabu siku kwa siku kwa kutumia Matrix
        $totalPrice  = 0;
        $currentDate = $checkin->copy();

        while ($currentDate->lt($checkout)) {
            $season = $this->checkIfHighSeason($currentDate) ? 'high' : 'low';
            
            // Angalia kama hii siku inastahili kuwa na HB au FB
            $dailyMealPlan = 'BB';
            if ($mealPlan !== 'BB' && $mealDaysRemaining > 0) {
                $dailyMealPlan = $mealPlan;
                $mealDaysRemaining--; // Punguza siku moja ya mlo
            }

            // Daka bei ya hiyo siku kutoka kwenye Matrix kulingana na (Msimu, Chumba, na Mlo)
            $dailyPrice = $matrix[$season][$room_id][$dailyMealPlan];
            $totalPrice += $dailyPrice;

            $currentDate->addDay();
        }

        return view('checkout', [
            'room'        => $room,
            'room_id'     => $room_id,
            'checkin'     => $checkin->format('d M Y'),
            'checkout'    => $checkout->format('d M Y'),
            'nights'      => $nights,
            'guests'      => $request->guests,
            'meal_plan'   => $mealPlan,
            'meal_days'   => (int) $request->input('meal_days', 0),
            'total_price' => $totalPrice,
        ]);
    }

    public function submitBooking(Request $request)
    {
        $validated = $request->validate([
            'first_name'      => 'required|string|max:255',
            'last_name'       => 'required|string|max:255',
            'email'           => 'required|email|max:255',
            'nationality'     => 'required|string|max:255',
            'phone_full'      => 'required|string|max:50',
            'special_request' => 'nullable|string|max:1000',
            'room_id'         => 'required|integer',
            'checkin'         => 'required|string',
            'checkout'        => 'required|string',
            'guests'          => 'required|string',
            'meal_plan'       => 'nullable|string|in:BB,HB,FB',
            'meal_days'       => 'nullable|integer|min:0',
            'total_price'     => 'required|numeric',
        ]);

        $rooms    = $this->getRooms();
        $roomId   = (int) $validated['room_id'];
        $roomName = isset($rooms[$roomId]) ? $rooms[$roomId]['name'] : 'Unknown Room';

        $checkinDate  = Carbon::parse($validated['checkin']);
        $checkoutDate = Carbon::parse($validated['checkout']);
        $nights       = $checkinDate->diffInDays($checkoutDate);

        // Security check: Piga hesabu upya hapa hapa server-side ili mteja asi-cheat bei kupitia Inspect Element
        $matrix            = $this->getPricingMatrix();
        $mealPlan          = $validated['meal_plan'] ?? 'BB';
        $mealDaysRemaining = $validated['meal_days'] ?? 0;
        
        $serverCalculatedPrice = 0;
        $currentDate           = $checkinDate->copy();

        while ($currentDate->lt($checkoutDate)) {
            $season = $this->checkIfHighSeason($currentDate) ? 'high' : 'low';
            $dailyMealPlan = 'BB';
            
            if ($mealPlan !== 'BB' && $mealDaysRemaining > 0) {
                $dailyMealPlan = $mealPlan;
                $mealDaysRemaining--;
            }

            $serverCalculatedPrice += $matrix[$season][$roomId][$dailyMealPlan];
            $currentDate->addDay();
        }

        $bookingData = [
            'first_name'      => $validated['first_name'],
            'last_name'       => $validated['last_name'],
            'email'           => $validated['email'],
            'nationality'     => $validated['nationality'],
            'phone'           => $validated['phone_full'],
            'special_request' => $validated['special_request'] ?? null,
            'room_name'       => $roomName,
            'checkin'         => $validated['checkin'],
            'checkout'        => $validated['checkout'],
            'guests'          => $validated['guests'],
            'nights'          => $nights,
            'meal_plan'       => $mealPlan,
            'meal_days'       => $validated['meal_days'] ?? 0,
            'total_price'     => $serverCalculatedPrice, // Tunatumia bei halisi iliyohakikiwa na server
        ];

        Mail::to('booking@kigongonigazella.co.tz')->send(new BookingHotelMail($bookingData));
        Mail::to($validated['email'])->send(new BookingGuestMail($bookingData));

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json(['success' => true]);
        }

        return redirect()->route('home')->with('success', 'Booking received!');
    }

    /**
     * Kalenda ya Misimu (High vs Low)
     */
    private function checkIfHighSeason(\Carbon\Carbon $date): bool
    {
        $month = $date->month;
        $day = $date->day;

        // Miezi kamili ya High Season (Feb, Jun, Jul, Aug)
        if (in_array($month, [2, 6, 7, 8])) {
            return true;
        }

        // High Season kuanzia Dec 15 mpaka Dec 31
        if ($month == 12 && $day >= 15) {
            return true;
        }

        // High Season kuanzia Jan 1 mpaka Jan 14
        if ($month == 1 && $day <= 14) {
            return true;
        }

        // Tarehe na miezi iliyobaki yote ni Low Season
        return false;
    }
}