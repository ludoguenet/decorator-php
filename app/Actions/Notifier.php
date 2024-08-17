<?php

declare(strict_types=1);

namespace App\Actions;

use App\Models\User;
use App\Notifications\UserNotification;

class Notifier implements NotifierInterface
{
    public function send(User $user): void
    {
        $user->notify(new UserNotification());
    }
}
