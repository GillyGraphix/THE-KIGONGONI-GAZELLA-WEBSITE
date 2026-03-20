<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BookingGuestMail extends Mailable
{
    use Queueable, SerializesModels;

    public array $booking;

    public function __construct(array $booking)
    {
        $this->booking = $booking;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '✅ Reservation Request Received — Kigongoni Gazella Hotel',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.booking-guest',
            with: ['booking' => $this->booking],
        );
    }
}