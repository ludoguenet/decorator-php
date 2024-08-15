<?php

namespace App\Actions;

use App\Models\User;

interface NotifierInterface
{
    public function send(User $user);
}
