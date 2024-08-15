<?php

namespace App\Actions;

use App\Models\User;
use App\Notifications\SlackNotification;

class SlackNotifierDecorator implements NotifierInterface
{
    public function __construct(private NotifierInterface $notifier) {}

    public function send(User $user)
    {
        $this->notifier->send($user);

        $user->notify(new SlackNotification);
    }
}
