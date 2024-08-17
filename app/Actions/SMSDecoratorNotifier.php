<?php

declare(strict_types=1);

namespace App\Actions;

use App\Models\User;
use App\Notifications\SlackNotification;
use App\Notifications\SMSNotification;

readonly class SMSDecoratorNotifier implements NotifierInterface
{
    public function __construct(private NotifierInterface $notifier) {}

    public function send(User $user): void
    {
        $this->notifier->send($user);

        $user->notify(new SMSNotification());
    }
}
