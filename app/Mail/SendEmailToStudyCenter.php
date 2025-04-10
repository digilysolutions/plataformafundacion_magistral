<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendEmailToStudyCenter extends Mailable
{
    use Queueable, SerializesModels;

    private $studyCenter;
    private $user;
    /**
     * Create a new message instance.
     */
    public function __construct($user,$studyCenter)
    {
        $this->studyCenter = $studyCenter;
        $this->user = $user;
    }
    public function build()
    {
        return $this->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'))->subject('Centro de Estudio registrado')
            ->view('emails.email_study_center')
            ->with('user', $this->user)
            ->with('studyCenter', $this->studyCenter);
    }
    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Centro de Estudio registrado',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.email_study_center',
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
