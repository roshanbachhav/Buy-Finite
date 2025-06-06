<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderMail extends Mailable
{
    use Queueable, SerializesModels;
    public $orders;

    public function __construct($orders)
    {
        $this->orders = $orders;
    }


    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->orders['subject'],
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mail.orderMail',
        );
    }

    public function attachments(): array
    {
        return [];
    }

}