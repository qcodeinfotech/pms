<?php

use App\Models\User;

function getAppName()
{
    return config('app.name');
}

function redirectTo()
{
    $user = Auth::user();

    if ($user->hasRole(User::ROLE_ADMIN)) {
        return route('admin.dashboard');
    }
}
