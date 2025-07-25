<?php

namespace App\Console\Commands;

use App\Events\ArticleEmailEvent;
use Illuminate\Console\Command;
use App\Events\ArticleGenerated;
use App\Models\User;

class FireArticleEmailEvent extends Command
{
    protected $signature = 'fire:articleEmail {user_id?}';

    protected $description = 'Fire event to send article via email';

    public function handle()
    {
        $userId = $this->argument('user_id') ?? (auth()->user() ? auth()->user()->id : 1);
        $user = User::find($userId);

        if (!$user) {
            $this->error('User not found.');
            return;
        }

        $article = "Welcome, {$user->name}! This is your welcome email.";
        event(new \App\Events\ArticleEmailEvent($article, $user));

        $this->info('Article event fired and email should be sent.');
    }
}
