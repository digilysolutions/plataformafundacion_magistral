<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendEmailwhitCode extends Mailable
{
    use Queueable, SerializesModels;

    private $person;

    private $user;
    /**
     * Create a new message instance.
     */
    public function __construct($user, $person)
    {
        $this->user = $user;
        $this->person = $person;

    }
    public function build()
    {
        return $this->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'))->subject('Solicitud del código de seguimiento')
            ->view('emails.send_code')
            ->with([
                'url' => route('verifyTokenToCode', $this->user->verification_token),
                'verificationCode' => $this->user->verification_code,
            ])
            ->with('user', $this->user)
            ->with('person', $this->person);
    }
    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Solicitud del código de seguimiento',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.send_code',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
