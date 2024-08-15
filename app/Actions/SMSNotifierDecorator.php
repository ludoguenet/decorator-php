<?php

namespace App\Actions;

use App\Models\User;
use App\Notifications\SMSNotification;

class SMSNotifierDecorator implements NotifierInterface
{
    public function __construct(private NotifierInterface $notifier) {}

    public function send(User $user)
    {
        $this->notifier->send($user);

        $user->notify(new SMSNotification);
    }
}
