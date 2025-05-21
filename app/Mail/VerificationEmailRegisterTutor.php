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

    private $name;
    private $verificationCode;
    private  $verification_token;
    private $url;
    /**
     * Create a new message instance.
     */
    public function __construct($name, $verificationCode, $verification_token, $url)
    {
        $this->name = $name;
        $this->verificationCode = $verificationCode;
        $this->verification_token = $verification_token;
         $this->url = $url;
    }
    public function build()
    {
        return $this->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'))->subject('Verifica tu correo')
            ->view('emails.verification_register_tutor')
            ->with([
                'url' => route('verify', $this->url),
                'verificationCode' => $this->verificationCode,
                'name' => $this->name
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
