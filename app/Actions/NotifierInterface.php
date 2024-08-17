<?php

declare(strict_types=1);

namespace App\Actions;

use App\Models\User;

interface NotifierInterface
{
    public function send(User $user): void;
}
