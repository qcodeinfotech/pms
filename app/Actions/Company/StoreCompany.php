<?php

namespace App\Actions\Company;

use App\Models\User;
use Lorisleiva\Actions\Concerns\AsAction;

class StoreCompany
{
    use AsAction;

    public function handle($input)
    {
        /** @var User $user */
        $user = User::create($input);
        $user->sendEmailVerificationNotification();
        $user->assignRole(User::ROLE_COMPANY);

        if (!empty($input['image'])) {
            $user->addMedia($input['image'])
            ->toMediaCollection(User::PROFILE_PATH, config('filesystems.default'));
        }

        return true;
    }
}
