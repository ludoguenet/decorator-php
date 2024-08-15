<?php

namespace App\Actions;

use App\Models\User;

class SMSNotifier extends Notifier {
    public function send(User $user) {
        $this->sendEmail($user);

        echo 'Notification SMS envoyée à ' . $user->name;
    }
}
