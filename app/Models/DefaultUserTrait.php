<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Builder;

trait DefaultUserTrait
{
    public function scopeUser(Builder $builder)
    {
        return $builder->whereUserId(Auth::id());
    }
}
