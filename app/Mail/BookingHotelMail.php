<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BookingHotelMail extends Mailable
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
            subject: '🏨 New Reservation Request — ' . $this->booking['room_name'],
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.booking-hotel',
            with: ['booking' => $this->booking],
        );
    }
}