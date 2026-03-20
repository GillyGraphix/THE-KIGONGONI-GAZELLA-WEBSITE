<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation Request Received</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', Arial, sans-serif; background: #f3f4f6; color: #1f2937; }
        .wrapper { max-width: 620px; margin: 32px auto; background: #ffffff; border-radius: 16px; overflow: hidden; box-shadow: 0 4px 24px rgba(0,0,0,0.10); }

        /* Header */
        .header { background: #123960; padding: 40px 40px 32px; text-align: center; position: relative; }
        .header::after { content: ''; position: absolute; bottom: 0; left: 0; right: 0; height: 4px; background: #ef4a25; }
        .header img { height: 60px; margin-bottom: 20px; filter: brightness(0) invert(1); }

        /* Check icon */
        .check-wrap { display: inline-flex; width: 72px; height: 72px; border-radius: 50%; background: rgba(255,255,255,0.12); border: 2px solid rgba(255,255,255,0.25); align-items: center; justify-content: center; margin-bottom: 18px; }
        .check-wrap svg { width: 36px; height: 36px; }

        .header h1 { color: #ffffff; font-size: 24px; font-weight: 800; letter-spacing: 0.5px; margin-bottom: 6px; }
        .header p { color: rgba(255,255,255,0.65); font-size: 14px; }

        /* Body */
        .body { padding: 36px 40px; }

        /* Greeting */
        .greeting { font-size: 16px; font-weight: 600; color: #111827; margin-bottom: 12px; }
        .greeting span { color: #ef4a25; font-weight: 800; }
        .sub-text { font-size: 14px; color: #6b7280; line-height: 1.7; margin-bottom: 28px; }

        /* Section title */
        .section-title { font-size: 11px; font-weight: 800; color: #ef4a25; text-transform: uppercase; letter-spacing: 2px; margin-bottom: 14px; padding-bottom: 8px; border-bottom: 2px solid #fce8e3; }

        /* Booking card */
        .booking-card { background: linear-gradient(135deg, #123960 0%, #1a4f80 100%); border-radius: 14px; padding: 28px; margin-bottom: 28px; color: white; }
        .booking-card .room-name { font-size: 18px; font-weight: 800; color: #ffffff; margin-bottom: 20px; padding-bottom: 16px; border-bottom: 1px solid rgba(255,255,255,0.15); }
        .booking-card .room-name span { display: block; font-size: 10px; font-weight: 600; color: #ef4a25; text-transform: uppercase; letter-spacing: 2px; margin-bottom: 4px; }
        .dates-row { display: grid; grid-template-columns: 1fr auto 1fr; align-items: center; gap: 12px; margin-bottom: 20px; }
        .date-item { background: rgba(255,255,255,0.1); border-radius: 10px; padding: 12px 16px; }
        .date-item .dlabel { font-size: 10px; font-weight: 600; color: rgba(255,255,255,0.5); text-transform: uppercase; letter-spacing: 1px; margin-bottom: 4px; }
        .date-item .dvalue { font-size: 14px; font-weight: 800; color: #ffffff; }
        .date-arrow { text-align: center; color: #ef4a25; font-size: 20px; }
        .nights-badge { text-align: center; background: rgba(239,74,37,0.2); border: 1px solid rgba(239,74,37,0.4); border-radius: 8px; padding: 10px; margin-bottom: 20px; }
        .nights-badge .nlabel { font-size: 10px; font-weight: 600; color: rgba(255,255,255,0.5); text-transform: uppercase; letter-spacing: 1px; }
        .nights-badge .nvalue { font-size: 20px; font-weight: 800; color: #ef4a25; }
        .price-row { display: flex; justify-content: space-between; align-items: center; background: rgba(255,255,255,0.07); border-radius: 8px; padding: 12px 16px; }
        .price-row .plabel { font-size: 12px; font-weight: 600; color: rgba(255,255,255,0.6); }
        .price-row .pvalue { font-size: 22px; font-weight: 900; color: #ef4a25; }
        .guests-row { display: flex; align-items: center; gap: 1.5rem; margin-top: 12px; }
        .guests-pill { background: rgba(255,255,255,0.1); border-radius: 20px; padding: 6px 14px; font-size: 12px; font-weight: 600; color: rgba(255,255,255,0.8); margin-top: 10px; display: inline-block; }

        /* What next */
        .next-block { background: #f0fdf4; border: 1px solid #bbf7d0; border-radius: 12px; padding: 20px 24px; margin-bottom: 24px; }
        .next-block .next-title { font-size: 13px; font-weight: 800; color: #15803d; margin-bottom: 12px; text-transform: uppercase; letter-spacing: 0.5px; }
        .next-item { display: flex; align-items: flex-start; gap: 10px; margin-bottom: 10px; }
        .next-item:last-child { margin-bottom: 0; }
        .next-num { font-size: 15px; font-weight: 800; color: #15803d; flex-shrink: 0; margin-right: 4px; }
        .next-text { font-size: 13px; color: #166534; line-height: 1.5; }

        /* Contact */
        .contact-block { background: #f9fafb; border: 1px solid #e5e7eb; border-radius: 12px; padding: 20px 24px; margin-bottom: 28px; }
        .contact-row { display: flex; align-items: center; gap: 12px; margin-bottom: 12px; }
        .contact-row:last-child { margin-bottom: 0; }
        .contact-icon { width: 36px; height: 36px; border-radius: 8px; background: #fce8e3; display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
        .contact-icon svg { width: 18px; height: 18px; color: #ef4a25; }
        .contact-label { font-size: 11px; font-weight: 600; color: #9ca3af; text-transform: uppercase; letter-spacing: 0.5px; }
        .contact-value { font-size: 14px; font-weight: 700; color: #111827; }
        .contact-value a { color: #123960; text-decoration: none; }

        /* Footer */
        .footer { background: #123960; padding: 24px 40px; text-align: center; }
        .footer p { font-size: 12px; color: rgba(255,255,255,0.5); line-height: 1.7; }
        .footer a { color: #ef4a25; text-decoration: none; font-weight: 600; }
        .footer .brand { font-size: 14px; font-weight: 800; color: rgba(255,255,255,0.9); letter-spacing: 1px; text-transform: uppercase; margin-bottom: 8px; }

        @media (max-width: 480px) {
            .body { padding: 24px 20px; }
            .header { padding: 28px 20px 24px; }
            .footer { padding: 20px; }
            .dates-row { grid-template-columns: 1fr; }
            .date-arrow { transform: rotate(90deg); }
        }
    </style>
</head>
<body>
<div class="wrapper">

    {{-- HEADER --}}
    <div class="header">
        <div>
            <img src="https://kigongonigazella.co.tz/images/logo.png" alt="Kigongoni Gazella Hotel">
        </div>
        <div class="check-wrap">
            <svg fill="none" stroke="#ffffff" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
        </div>
        <h1>Reservation Request Received!</h1>
        <p>We'll be in touch with you very shortly</p>
    </div>

    <div class="body">

        {{-- GREETING --}}
        <p class="greeting">Dear <span>{{ $booking['first_name'] }} {{ $booking['last_name'] }}</span>,</p>
        <p class="sub-text">
            Thank you for choosing <strong>Kigongoni Gazella Hotel</strong>! We have successfully received your reservation request and our team will review it and get back to you as soon as possible to confirm your stay.
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
                    <div class="dlabel">Check-In</div>
                    <div class="dvalue">{{ $booking['checkin'] }}</div>
                </div>
                <div class="date-arrow">→</div>
                <div class="date-item">
                    <div class="dlabel">Check-Out</div>
                    <div class="dvalue">{{ $booking['checkout'] }}</div>
                </div>
            </div>
            <div class="price-row">
                <span class="plabel">{{ $booking['nights'] }} Night{{ $booking['nights'] > 1 ? 's' : '' }} · {{ $booking['guests'] }}</span>
                <span class="pvalue">${{ $booking['total_price'] }}</span>
            </div>
        </div>

        {{-- WHAT HAPPENS NEXT --}}
        <div class="section-title">What Happens Next?</div>
        <div class="next-block">
            <div class="next-title">✅ Here's what to expect</div>
            <div class="next-item">
                <div class="next-num">1.</div>
                <div class="next-text">Our team will review your reservation request within <strong>a few hours</strong>.</div>
            </div>
            <div class="next-item">
                <div class="next-num">2.</div>
                <div class="next-text">We will contact you via <strong>email or phone</strong> to confirm your booking and discuss any special arrangements.</div>
            </div>
            <div class="next-item">
                <div class="next-num">3.</div>
                <div class="next-text">Once confirmed, you'll receive a <strong>final confirmation</strong> with all the details for your stay.</div>
            </div>
        </div>

        {{-- CONTACT --}}
        <div class="section-title">Need to Reach Us?</div>
        <div class="contact-block">
            <div class="contact-row">
                <div class="contact-icon">
                    <svg fill="none" stroke="#ef4a25" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                </div>
                <div>
                    <div class="contact-label">Phone / WhatsApp</div>
                    <div class="contact-value"><a href="tel:+255768219703">+255 768 219 703</a></div>
                </div>
            </div>
            <div class="contact-row">
                <div class="contact-icon">
                    <svg fill="none" stroke="#ef4a25" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                </div>
                <div>
                    <div class="contact-label">Email</div>
                    <div class="contact-value"><a href="mailto:booking@kigongonigazella.co.tz">booking@kigongonigazella.co.tz</a></div>
                </div>
            </div>
            <div class="contact-row">
                <div class="contact-icon">
                    <svg fill="none" stroke="#ef4a25" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/></svg>
                </div>
                <div>
                    <div class="contact-label">Location</div>
                    <div class="contact-value">Mto wa Mbu, Manyara, Tanzania</div>
                </div>
            </div>
        </div>

    </div>

    {{-- FOOTER --}}
    <div class="footer">
        <div class="brand">Kigongoni Gazella Hotel</div>
        <p>
            "Stay in Comfort, Leave with a Smile"<br>
            <a href="https://kigongonigazella.co.tz">kigongonigazella.co.tz</a>
        </p>
    </div>

</div>
</body>
</html>