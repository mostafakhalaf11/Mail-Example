<?php

namespace App\Listeners;

use App\Events\ArticleEmailEvent;
use App\Mail\ArticleEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendArticleEmail
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    public function handle(ArticleEmailEvent $event)
    {
        Mail::to($event->user->email)->send(new ArticleEmail($event->articleContent, $event->user));
    }
}
