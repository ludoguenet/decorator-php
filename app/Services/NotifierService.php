<?php

namespace App\Services;

use App\Actions\FacebookDecoratorNotifier;
use App\Actions\Notifier;
use App\Actions\SlackDecoratorNotifier;
use App\Actions\SlackNotifier;
use App\Actions\SMSDecoratorNotifier;
use App\Actions\SMSNotifier;
use App\Models\User;

class NotifierService
{
    public function handle(User $user): void
    {
        $notifier = new Notifier;

        if ($user->notify_facebook) {
            $notifier = new FacebookDecoratorNotifier($notifier);
        }

        if ($user->notify_slack) {
            $notifier = new SlackDecoratorNotifier($notifier);
        }

        if ($user->notify_sms) {
            $notifier = new SMSDecoratorNotifier($notifier);
        }

        $notifier->send($user);
    }
}
