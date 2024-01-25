<?php

use App\Models\User;

function getAppName()
{
    return config('app.name');
}

function logInUser()
{
    return Auth::user();
}

function redirectTo()
{
    $user = Auth::user();

    if ($user->hasRole(User::ROLE_ADMIN)) {
        return route('admin.dashboard');
    }

    if ($user->hasRole(User::ROLE_COMPANY)) {
        return route('company.dashboard');
    }
}
