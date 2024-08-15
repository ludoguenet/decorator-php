<?php

namespace App\Actions;

use App\Models\User;

class SMSNotifierDecorator implements NotifierInterface {
    public function __construct(private NotifierInterface $notifier){}

    public function send(User $user)
    {
        $this->notifier->send($user);

        echo 'Notification SMS envoyée à ' . $user->name;
    }
}
