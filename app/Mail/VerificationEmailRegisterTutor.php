<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class VerificationEmailRegisterTutor extends Mailable
{
    use Queueable, SerializesModels;

    private $user_register;

    /**
     * Create a new message instance.
     */
    public function __construct($user_register)
    {
        $this->user_register = $user_register;

    }
    public function build()
    {
        return $this->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'))->subject('Verifica tu correo')
            ->view('emails.verification_register_tutor')
            ->with([
                'url' => route('verify', $this->user_register->verification_token),
                'verificationCode' => $this->user_register->verification_code,
                'user' => $this->user_register
            ]);
    }
    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Verificación de Correo',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.verification_register_tutor',
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
