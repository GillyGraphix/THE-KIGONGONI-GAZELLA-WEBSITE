<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use App\Mail\BookingHotelMail;
use App\Mail\BookingGuestMail;

class BookingController extends Controller
{
    private function getRooms()
    {
        return [
            1 => [
                'id'         => 1,
                'name'       => 'Standard Double Room',
                'image'      => asset('images/rooms/standard-double/main.jpg'),
                'low_price'  => 50,
                'high_price' => 75,
                'features'   => '1 Queen/King Bed • Free Wi-Fi • Hot Shower • Breakfast Included',
            ],
            2 => [
                'id'         => 2,
                'name'       => 'Standard Triple Room',
                'image'      => asset('images/rooms/standard-triple/main.jpg'),
                'low_price'  => 80,
                'high_price' => 110,
                'features'   => '1 Double & 1 Single Bed • Free Wi-Fi • En-suite Bathroom • Breakfast Included',
            ],
            3 => [
                'id'         => 3,
                'name'       => 'Standard Family Room',
                'image'      => asset('images/rooms/standard-family/main.jpg'),
                'low_price'  => 100,
                'high_price' => 140,
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

    public function checkout(Request $request, $room_id)
    {
        $request->validate([
            'checkin'  => 'required|string',
            'checkout' => 'required|string',
            'guests'   => 'required|string',
        ]);

        $checkin  = Carbon::parse($request->checkin);
        $checkout = Carbon::parse($request->checkout);
        $nights   = $checkin->diffInDays($checkout);
        $rooms    = $this->getRooms();

        if (!array_key_exists($room_id, $rooms)) {
            return redirect()->back()->with('error', 'Room not found.');
        }

        $room       = $rooms[$room_id];
        $totalPrice = 0;
        $currentDate = $checkin->copy();
        while ($currentDate->lt($checkout)) {
            $totalPrice += $this->checkIfHighSeason($currentDate) ? $room['high_price'] : $room['low_price'];
            $currentDate->addDay();
        }

        return view('checkout', [
            'room'        => $room,
            'room_id'     => $room_id,
            'checkin'     => $checkin->format('d M Y'),
            'checkout'    => $checkout->format('d M Y'),
            'nights'      => $nights,
            'total_price' => $totalPrice,
            'guests'      => $request->guests,
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
            'total_price'     => 'required|numeric',
        ]);

        // Pata jina la chumba
        $rooms    = $this->getRooms();
        $roomId   = (int) $validated['room_id'];
        $roomName = isset($rooms[$roomId]) ? $rooms[$roomId]['name'] : 'Unknown Room';

        // Hesabu usiku
        $checkinDate  = Carbon::parse($validated['checkin']);
        $checkoutDate = Carbon::parse($validated['checkout']);
        $nights       = $checkinDate->diffInDays($checkoutDate);

        // Packaging ya data — itatumika kwenye email templates zote mbili
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
            'total_price'     => $validated['total_price'],
        ];

        // ── Tuma email kwa HOTEL (wewe) ──────────────────────────
        Mail::to(env('HOTEL_NOTIFY_EMAIL', config('mail.from.address')))
            ->send(new BookingHotelMail($bookingData));

        // ── Tuma email kwa MTEJA ─────────────────────────────────
        Mail::to($validated['email'])
            ->send(new BookingGuestMail($bookingData));

        // ── Jibu ─────────────────────────────────────────────────
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json(['success' => true]);
        }

        return redirect()->route('home')->with('success', 'Booking received!');
    }

    private function checkIfHighSeason($date): bool
    {
        return $date->month >= 5 && $date->month <= 12;
    }
}