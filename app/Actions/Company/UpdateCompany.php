<?php

namespace App\Actions\Company;

use App\Models\User;
use Hash;
use Lorisleiva\Actions\Concerns\AsAction;

class UpdateCompany
{
    use AsAction;

    public function handle($id, $input)
    {
        /** @var User $user */
        $user = User::findOrFail($id);

        if (!empty($input['password'])) {
            $password = Hash::make($input['password']);
            $user->update(['password' => $password]);
        }
        unset($input['password']);
        unset($input['confirm_password']);

        $user->update($input);

        if (!empty($input['image'])) {
            $user->clearMediaCollection(User::PROFILE_PATH);
            $user->addMedia($input['image'])
                ->toMediaCollection(User::PROFILE_PATH, config('filesystems.default'));
        }

        return true;
    }
}
