<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Reservation Request</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', Arial, sans-serif; background: #f3f4f6; color: #1f2937; }
        .wrapper { max-width: 620px; margin: 32px auto; background: #ffffff; border-radius: 16px; overflow: hidden; box-shadow: 0 4px 24px rgba(0,0,0,0.10); }

        /* Header */
        .header { background: #123960; padding: 32px 40px; text-align: center; }
        .header img { height: 56px; margin-bottom: 16px; filter: brightness(0) invert(1); }
        .header h1 { color: #ffffff; font-size: 22px; font-weight: 800; letter-spacing: 1px; text-transform: uppercase; margin-bottom: 4px; }
        .header p { color: rgba(255,255,255,0.6); font-size: 13px; }

        /* Alert banner */
        .alert-banner { background: #ef4a25; padding: 14px 40px; display: flex; align-items: center; gap: 10px; }
        .alert-banner span { color: #ffffff; font-weight: 700; font-size: 14px; letter-spacing: 0.5px; }

        /* Body */
        .body { padding: 36px 40px; }

        /* Section title */
        .section-title { font-size: 11px; font-weight: 800; color: #ef4a25; text-transform: uppercase; letter-spacing: 2px; margin-bottom: 14px; padding-bottom: 8px; border-bottom: 2px solid #fce8e3; }

        /* Info rows */
        .info-block { background: #f9fafb; border-radius: 12px; padding: 20px 24px; margin-bottom: 24px; border: 1px solid #e5e7eb; }
        .info-row { display: flex; justify-content: space-between; align-items: flex-start; padding: 8px 0; border-bottom: 1px solid #e5e7eb; }
        .info-row:last-child { border-bottom: none; padding-bottom: 0; }
        .info-label { font-size: 12px; font-weight: 600; color: #6b7280; text-transform: uppercase; letter-spacing: 0.5px; min-width: 130px; }
        .info-value { font-size: 14px; font-weight: 700; color: #111827; text-align: right; }
        .info-value.highlight { color: #ef4a25; font-size: 16px; }

        /* Booking summary box */
        .booking-box { background: #123960; border-radius: 12px; padding: 24px; margin-bottom: 24px; color: white; }
        .booking-box .booking-grid { display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 16px; text-align: center; }
        .booking-box .bitem-label { font-size: 10px; font-weight: 600; color: rgba(255,255,255,0.5); text-transform: uppercase; letter-spacing: 1px; margin-bottom: 6px; }
        .booking-box .bitem-value { font-size: 14px; font-weight: 800; color: #ffffff; line-height: 1.3; }
        .booking-box .bitem-value.orange { color: #ef4a25; font-size: 22px; }
        .booking-divider { width: 1px; background: rgba(255,255,255,0.15); }

        /* Special request */
        .special-box { background: #fffbf0; border: 1px solid #fde68a; border-left: 4px solid #f59e0b; border-radius: 8px; padding: 16px 20px; margin-bottom: 24px; }
        .special-box .special-label { font-size: 11px; font-weight: 800; color: #b45309; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 8px; }
        .special-box p { font-size: 14px; color: #78350f; line-height: 1.6; font-style: italic; }

        /* Action buttons */
        .actions { display: flex; gap: 12px; margin-bottom: 28px; }
        .btn { display: inline-block; padding: 13px 24px; border-radius: 8px; font-size: 13px; font-weight: 700; text-decoration: none; text-align: center; flex: 1; }
        .btn-primary { background: #ef4a25; color: #ffffff; }
        .btn-secondary { background: #f3f4f6; color: #123960; border: 1px solid #d1d5db; }

        /* Footer */
        .footer { background: #f9fafb; border-top: 1px solid #e5e7eb; padding: 20px 40px; text-align: center; }
        .footer p { font-size: 12px; color: #9ca3af; line-height: 1.6; }
        .footer a { color: #ef4a25; text-decoration: none; }

        @media (max-width: 480px) {
            .body { padding: 24px 20px; }
            .header { padding: 24px 20px; }
            .alert-banner { padding: 12px 20px; }
            .actions { flex-direction: column; }
            .booking-box .booking-grid { grid-template-columns: 1fr; }
            .booking-divider { display: none; }
        }
    </style>
</head>
<body>
<div class="wrapper">

    {{-- HEADER --}}
    <div class="header">
        <h1>New Reservation Request</h1>
        <p>A new booking has just been submitted via the website</p>
    </div>

    {{-- ALERT BANNER --}}
    <div class="alert-banner">
        <span>🔔 &nbsp; ACTION REQUIRED — Please confirm or contact the guest</span>
    </div>

    <div class="body">

        {{-- BOOKING SUMMARY --}}
        <div class="section-title">Booking Summary</div>
        <div class="booking-box">
            <div class="booking-grid">
                <div>
                    <div class="bitem-label">Room</div>
                    <div class="bitem-value">{{ $booking['room_name'] }}</div>
                </div>
                <div>
                    <div class="bitem-label">Nights</div>
                    <div class="bitem-value orange">{{ $booking['nights'] }}</div>
                </div>
                <div>
                    <div class="bitem-label">Total</div>
                    <div class="bitem-value orange">${{ $booking['total_price'] }}</div>
                </div>
            </div>
        </div>

        {{-- DATES --}}
        <div class="info-block" style="margin-bottom: 24px;">
            <div class="info-row">
                <span class="info-label">Check-In</span>
                <span class="info-value">{{ $booking['checkin'] }}</span>
            </div>
            <div class="info-row">
                <span class="info-label">Check-Out</span>
                <span class="info-value">{{ $booking['checkout'] }}</span>
            </div>
            <div class="info-row">
                <span class="info-label">Guests</span>
                <span class="info-value">{{ $booking['guests'] }}</span>
            </div>
        </div>

        {{-- GUEST INFORMATION --}}
        <div class="section-title">Guest Information</div>
        <div class="info-block">
            <div class="info-row">
                <span class="info-label">Full Name</span>
                <span class="info-value">{{ $booking['first_name'] }} {{ $booking['last_name'] }}</span>
            </div>
            <div class="info-row">
                <span class="info-label">Email</span>
                <span class="info-value">{{ $booking['email'] }}</span>
            </div>
            <div class="info-row">
                <span class="info-label">Phone</span>
                <span class="info-value highlight">{{ $booking['phone'] }}</span>
            </div>
            <div class="info-row">
                <span class="info-label">Nationality</span>
                <span class="info-value">{{ $booking['nationality'] }}</span>
            </div>
        </div>

        {{-- SPECIAL REQUEST --}}
        @if(!empty($booking['special_request']))
        <div class="section-title">Special Request</div>
        <div class="special-box">
            <div class="special-label">⚠️ Guest has a special request</div>
            <p>"{{ $booking['special_request'] }}"</p>
        </div>
        @endif

        {{-- ACTION BUTTONS --}}
        <div class="actions">
            <a href="mailto:{{ $booking['email'] }}" class="btn btn-primary">
                📧 &nbsp; Reply via Email
            </a>
            <a href="tel:{{ $booking['phone'] }}" class="btn btn-secondary">
                📞 &nbsp; Call Guest
            </a>
        </div>

    </div>

    {{-- FOOTER --}}
    <div class="footer">
        <p>
            This email was sent automatically from your booking system at<br>
            <a href="https://kigongonigazella.co.tz">kigongonigazella.co.tz</a>
        </p>
        <p style="margin-top: 8px;">© {{ date('Y') }} Kigongoni Gazella Hotel · Mto wa Mbu, Tanzania</p>
    </div>

</div>
</body>
</html>