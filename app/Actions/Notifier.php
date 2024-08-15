<?php

namespace App\Actions;

use App\Models\User;
use App\Notifications\UserNotification;

class Notifier implements NotifierInterface
{
    public function send(User $user)
    {
        $user->notify(new UserNotification);
    }
}
