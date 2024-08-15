<?php

namespace App\Services;

use App\Models\User;
use App\Actions\Notifier;
use App\Actions\SlackNotifierDecorator;
use App\Actions\FacebookNotifierDecorator;
use App\Actions\SMSNotifierDecorator;

class NotifierService {
    public function handle(User $user) {
        $notifier = new Notifier();

        if ($user->notify_slack) {
            $notifier = new SlackNotifierDecorator($notifier);
        }

        if ($user->notify_facebook) {
            $notifier = new FacebookNotifierDecorator($notifier);
        }

        if ($user->notify_sms) {
            $notifier = new SMSNotifierDecorator($notifier);
        }
    
        $notifier->send($user);
    }
}
