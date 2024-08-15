<?php

namespace App\Actions;

use App\Models\User;

class FacebookNotifierDecorator implements NotifierInterface {
    public function __construct(private NotifierInterface $notifier){}

    public function send(User $user)
    {
        $this->notifier->send($user);

        echo 'Notification Facebook envoyée à ' . $user->name;
    }
}
