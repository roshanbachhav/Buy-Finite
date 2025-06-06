<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactUsMail extends Mailable
{
    use Queueable, SerializesModels;

    public $contactMailData;

    public function __construct($contactMailData)
    {
        $this->contactMailData = $contactMailData;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->contactMailData['main_subject'],
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mail.contactUsMail',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}