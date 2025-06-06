<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RecoveryPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    public $resetInfo;

    public function __construct($resetInfo)
    {
        $this->resetInfo = $resetInfo;
    }


    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Reset your password – BuyFinite',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mail.recoveryPasswordMail',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}