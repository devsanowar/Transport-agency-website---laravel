<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public array $data; // public, type hinted

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Contact Mail from '.$this->data['name'],
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.contact' // 'with' array not needed
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
