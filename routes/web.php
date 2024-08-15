<?php

use App\Models\User;
use App\Services\NotifierService;
use Illuminate\Support\Facades\Route;

Route::get('/notify/{user}', function (User $user) {
    (new NotifierService)->handle($user);

});
