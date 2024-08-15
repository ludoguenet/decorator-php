<?php

namespace App\Actions;

use App\Models\User;
use App\Notifications\FacebookNotification;

class FacebookNotifierDecorator implements NotifierInterface
{
    public function __construct(private NotifierInterface $notifier) {}

    public function send(User $user)
    {
        $this->notifier->send($user);

        $user->notify(new FacebookNotification);
    }
}
