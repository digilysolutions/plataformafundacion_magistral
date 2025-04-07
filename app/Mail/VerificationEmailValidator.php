<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class VerificationEmailValidator extends Mailable
{
    use Queueable, SerializesModels;

    private $user;
    private $password;
    /**
     * Create a new message instance.
     */
    public function __construct($user,$password)
    {

        $this->user = $user;
        $this->password = $password;
    }
    public function build()
    {
        return $this->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'))->subject('Verifica tu correo')
            ->view('emails.verification_validator')
            ->with([
                'url' => route('verify', $this->user->verification_token),
                'verificationCode' => $this->user->verification_code,
            ])
            ->with('user', $this->user)
            ->with('password', $this->password); 
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
            view: 'emails.verification_validator',
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
