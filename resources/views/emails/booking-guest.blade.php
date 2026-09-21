<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation Request Received</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', Arial, sans-serif; background: #f3f4f6; color: #1f2937; line-height: 1.6; }
        .wrapper { max-width: 620px; margin: 32px auto; background: #ffffff; border-radius: 16px; overflow: hidden; box-shadow: 0 10px 25px rgba(0,0,0,0.1); }

        /* Header */
        .header { background: #123960; padding: 40px; text-align: center; position: relative; border-bottom: 5px solid #ef4a25; }
        
        /* Logo Circle */
        .logo-container { margin-bottom: 24px; }
        .logo-circle { display: inline-block; background: #ffffff; width: 85px; height: 85px; border-radius: 50%; padding: 12px; border: 3px solid #ef4a25; box-shadow: 0 4px 12px rgba(0,0,0,0.2); text-align: center; line-height: 55px; }
        .logo-circle img { max-width: 100%; max-height: 100%; vertical-align: middle; }

        .header h1 { color: #ffffff; font-size: 24px; font-weight: 800; letter-spacing: 0.5px; margin-bottom: 6px; }
        .header p { color: rgba(255,255,255,0.7); font-size: 14px; font-weight: 500; }

        /* Body */
        .body { padding: 40px; }

        /* Greeting */
        .greeting { font-size: 16px; font-weight: 600; color: #111827; margin-bottom: 12px; }
        .greeting span { color: #ef4a25; font-weight: 800; }
        .sub-text { font-size: 14px; color: #4b5563; margin-bottom: 30px; }

        /* Section title */
        .section-title { font-size: 11px; font-weight: 800; color: #ef4a25; text-transform: uppercase; letter-spacing: 2px; margin-bottom: 16px; padding-bottom: 8px; border-bottom: 2px solid #fce8e3; }

        /* Booking card */
        .booking-card { background: linear-gradient(135deg, #123960 0%, #1a4f80 100%); border-radius: 16px; padding: 30px; margin-bottom: 16px; color: white; box-shadow: 0 4px 15px rgba(18,57,96,0.15); }
        .room-name { font-size: 20px; font-weight: 800; color: #ffffff; margin-bottom: 24px; padding-bottom: 20px; border-bottom: 1px solid rgba(255,255,255,0.15); }
        .room-name span { display: block; font-size: 10px; font-weight: 700; color: #ef4a25; text-transform: uppercase; letter-spacing: 2px; margin-bottom: 6px; }
        
        .dates-row { display: table; width: 100%; margin-bottom: 24px; }
        .date-item { display: table-cell; background: rgba(255,255,255,0.1); border-radius: 12px; padding: 16px; width: 45%; }
        .date-item .dlabel { font-size: 10px; font-weight: 600; color: rgba(255,255,255,0.6); text-transform: uppercase; letter-spacing: 1px; margin-bottom: 6px; }
        .date-item .dvalue { font-size: 15px; font-weight: 800; color: #ffffff; }
        .date-arrow { display: table-cell; vertical-align: middle; text-align: center; color: #ef4a25; font-size: 24px; font-weight: bold; width: 10%; }
        
        /* Proper Spacing for Nights & Guests */
        .meta-box { background: rgba(255,255,255,0.08); border: 1px solid rgba(255,255,255,0.15); border-radius: 12px; padding: 20px; display: table; width: 100%; }
        .meta-item { display: table-cell; border-right: 1px solid rgba(255,255,255,0.15); padding-right: 15px; width: 30%; }
        .meta-item.guests { padding-left: 15px; }
        .meta-item.total { border-right: none; text-align: right; width: 40%; vertical-align: middle; padding-left: 15px; }
        
        .mlabel { display: block; font-size: 10px; font-weight: 600; color: rgba(255,255,255,0.6); text-transform: uppercase; letter-spacing: 1px; margin-bottom: 4px; }
        .mval { font-size: 16px; font-weight: 800; color: #ffffff; }
        /* Tumeongeza white-space: nowrap kuzuia namba kushuka chini */
        .total-price { font-size: 26px; font-weight: 900; color: #ef4a25; white-space: nowrap; }

        /* Meal Plan Box - Imesafishwa (Clean Design) */
        .meal-box { background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 16px; padding: 20px 24px; margin-bottom: 35px; display: flex; justify-content: space-between; align-items: center; }
        .meal-info h4 { font-size: 11px; font-weight: 800; color: #64748b; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 4px; }
        .meal-info p { font-size: 16px; font-weight: 800; color: #0f172a; margin: 0; }
        .badge { background: #ef4a25; color: white; font-size: 12px; font-weight: 800; padding: 6px 14px; border-radius: 20px; }

        /* What next */
        .next-block { background: #f0fdf4; border: 1px solid #bbf7d0; border-radius: 16px; padding: 24px; margin-bottom: 35px; }
        .next-block .next-title { font-size: 12px; font-weight: 800; color: #166534; margin-bottom: 16px; text-transform: uppercase; letter-spacing: 1px; }
        .next-item { margin-bottom: 14px; font-size: 14px; color: #15803d; }
        .next-item:last-child { margin-bottom: 0; }
        .next-item strong { color: #166534; font-weight: 800; }

        /* Contact block - Imesafishwa (Clean Design) */
        .contact-block { background: #f9fafb; border: 1px solid #e5e7eb; border-radius: 16px; padding: 24px; }
        .contact-row { display: flex; flex-direction: column; margin-bottom: 20px; }
        .contact-row:last-child { margin-bottom: 0; }
        .c-label { font-size: 10px; font-weight: 700; color: #9ca3af; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 4px; }
        /* Tumeongeza word-break kuzuia email kutoka nje */
        .c-value { font-size: 15px; font-weight: 700; color: #111827; word-break: break-word; overflow-wrap: break-word; }
        .c-value a { color: #123960; text-decoration: none; }

        /* Footer */
        .footer { background: #123960; padding: 30px 40px; text-align: center; }
        .footer p { font-size: 13px; color: rgba(255,255,255,0.6); margin-bottom: 10px; }
        .footer a { color: #ef4a25; text-decoration: none; font-weight: 700; }
        .footer .brand { font-size: 16px; font-weight: 900; color: #ffffff; letter-spacing: 1px; text-transform: uppercase; margin-bottom: 6px; }

        @media (max-width: 480px) {
            .body { padding: 30px 20px; }
            .header { padding: 30px 20px; }
            .footer { padding: 30px 20px; }
            .dates-row, .meta-box { display: block; }
            .date-item { display: block; width: 100%; margin-bottom: 10px; }
            .date-arrow { display: block; width: 100%; padding: 10px 0; transform: rotate(90deg); }
            .meta-item { display: block; width: 100%; border-right: none; border-bottom: 1px solid rgba(255,255,255,0.15); padding: 15px 0; text-align: center; }
            .meta-item.guests { padding-left: 0; }
            .meta-item.total { border-bottom: none; text-align: center; padding-left: 0; padding-top: 20px; }
            .meal-box { flex-direction: column; align-items: flex-start; gap: 12px; }
        }
    </style>
</head>
<body>

@php
    $mealPlanNames = [
        'BB' => 'Bed & Breakfast',
        'HB' => 'Half Board',
        'FB' => 'Full Board',
    ];
    $mealPlan = $booking['meal_plan'] ?? 'BB';
    $displayMealName = $mealPlanNames[$mealPlan] ?? $mealPlan;
    $mealDays = $booking['meal_days'] ?? 0;
@endphp

<div class="wrapper">

    {{-- HEADER WITH LOGO IN WHITE CIRCLE --}}
    <div class="header">
        <div class="logo-container">
            <div class="logo-circle">
                <img src="https://kigongonigazella.co.tz/images/logo.png" alt="Kigongoni Gazella Hotel">
            </div>
        </div>
        <h1>Request Received!</h1>
        <p>We'll be in touch with you very shortly</p>
    </div>

    <div class="body">

        {{-- GREETING --}}
        <p class="greeting">Dear <span>{{ $booking['first_name'] }} {{ $booking['last_name'] }}</span>,</p>
        <p class="sub-text">
            Thank you for choosing <strong>Kigongoni Gazella Hotel</strong>! We have successfully received your reservation request. Our team will review it and get back to you shortly to confirm your stay.
        </p>

        {{-- BOOKING CARD --}}
        <div class="section-title">Your Reservation Summary</div>
        
        <div class="booking-card">
            <div class="room-name">
                <span>Selected Room</span>
                {{ $booking['room_name'] }}
            </div>
            
            <div class="dates-row">
                <div class="date-item">
                    <div class="dlabel">Check-In Date</div>
                    <div class="dvalue">{{ $booking['checkin'] }}</div>
                </div>
                <div class="date-arrow">→</div>
                <div class="date-item">
                    <div class="dlabel">Check-Out Date</div>
                    <div class="dvalue">{{ $booking['checkout'] }}</div>
                </div>
            </div>

            {{-- PROPER SPACING FOR NIGHTS, GUESTS & TOTAL --}}
            <div class="meta-box">
                <div class="meta-item">
                    <span class="mlabel">Duration</span>
                    <span class="mval">{{ $booking['nights'] }} Night(s)</span>
                </div>
                <div class="meta-item guests">
                    <span class="mlabel">Guests</span>
                    <span class="mval">{{ $booking['guests'] }}</span>
                </div>
                <div class="meta-item total">
                    <span class="mlabel">Total Price</span>
                    <span class="total-price">${{ $booking['total_price'] }}</span>
                </div>
            </div>
        </div>

        {{-- MEAL PLAN BOX (Clean Layout) --}}
        <div class="meal-box">
            <div class="meal-info">
                <h4>Meal Plan Selected</h4>
                <p>{{ $displayMealName }}</p>
            </div>
            @if($mealPlan != 'BB' && $mealDays > 0)
            <div class="meal-days-badge">
                <span class="badge">{{ $mealDays }} Day(s)</span>
            </div>
            @endif
        </div>

        {{-- WHAT HAPPENS NEXT --}}
        <div class="section-title">What Happens Next?</div>
        <div class="next-block">
            <div class="next-title">✅ Here's what to expect</div>
            <div class="next-item">
                1. Our team will review your reservation request within <strong>a few hours</strong>.
            </div>
            <div class="next-item">
                2. We will contact you via <strong>email or phone</strong> to confirm your booking and discuss any special arrangements.
            </div>
            <div class="next-item">
                3. Once confirmed, you'll receive a <strong>final confirmation</strong> with all the details for your stay.
            </div>
        </div>

        {{-- CONTACT BLOCK (Clean Layout without Icons) --}}
        <div class="section-title">Need to Reach Us?</div>
        <div class="contact-block">
            <div class="contact-row">
                <div class="c-label">Phone / WhatsApp</div>
                <div class="c-value"><a href="tel:+255768219703">+255 768 219 703</a></div>
            </div>
            <div class="contact-row">
                <div class="c-label">Email</div>
                <div class="c-value"><a href="mailto:booking@kigongonigazella.co.tz">booking@kigongonigazella.co.tz</a></div>
            </div>
            <div class="contact-row">
                <div class="c-label">Location</div>
                <div class="c-value">Mto wa Mbu, Manyara, Tanzania</div>
            </div>
        </div>

    </div>

    {{-- FOOTER --}}
    <div class="footer">
        <div class="brand">Kigongoni Gazella Hotel</div>
        <p>"Stay in Comfort, Leave with a Smile"</p>
        <a href="https://kigongonigazella.co.tz">kigongonigazella.co.tz</a>
    </div>

</div>
</body>
</html>