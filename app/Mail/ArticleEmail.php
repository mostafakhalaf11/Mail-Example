<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ArticleEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $articleContent;
    public $user;

    public function __construct($articleContent, User $user)
    {
        $this->articleContent = $articleContent;
        $this->user = $user;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Email Example',
        );
    }

    public function build()
    {
        return $this->subject('Your Requested Article')
            ->view('emails.article')
            ->with([
                'articleContent' => $this->articleContent,
                'user' => $this->user,
            ]);
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.article',
            with: [
                'articleContent' => $this->articleContent,
                'user' => $this->user,
            ],
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
