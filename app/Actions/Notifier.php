<?php

namespace App\Actions;

use App\Models\User;

class Notifier implements NotifierInterface {
    public function send(User $user) {
        echo 'Notification Email envoyé à ' . $user->name;
    }
}
