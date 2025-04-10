<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class VerificationEmailStudyCenter extends Mailable
{
    use Queueable, SerializesModels;
    private $user;
    private $studyCenter;
    /**
     * Create a new message instance.
     */
    public function __construct($user, $studyCenter)
    {
        $this->studyCenter = $studyCenter;
        $this->user = $user;
    }
    public function build()
    {
        return $this->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'))->subject('Verifica tu correo')
            ->view('emails.verification_study_center')
            ->with([
                'url' => route('verify', $this->user->verification_token),
                'verificationCode' => $this->user->verification_code

            ])->with('user', $this->user)
            ->with('studyCenter', $this->studyCenter);
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
            view: 'emails.verification_study_center',
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
