<?php

declare(strict_types=1);

namespace App\Actions;

use App\Models\User;
use App\Notifications\FacebookNotification;
use App\Notifications\SlackNotification;

readonly class SlackDecoratorNotifier implements NotifierInterface
{
    public function __construct(private NotifierInterface $notifier) {}

    public function send(User $user): void
    {
        $this->notifier->send($user);

        $user->notify(new SlackNotification());
    }
}
