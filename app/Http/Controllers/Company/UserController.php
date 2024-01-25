<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('company.users.index');
    }

    public function create()
    {
        return view('company.users.create');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('company.users.edit', compact('user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|unique:users',
            'password' => 'required'
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $input['company_user_id'] = Auth::id();
        $user = User::create($input);
        $user->assignRole(User::ROLE_USER);

        if (!empty($input['image'])) {
            $user->addMedia($input['image'])
                ->toMediaCollection(User::PROFILE_PATH, config('filesystems.default'));
        }

        flash()->success('User created successfully');

        return redirect(route('company.users.index'));
    }

    public function update($id, Request $request)
    {
        $user = User::findOrFail($id);

        $input = $request->all();

        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            unset($input['password']);
        }

        $user->update($input);

        if (!empty($input['image'])) {
            $user->clearMediaCollection(User::PROFILE_PATH);
            $user->addMedia($input['image'])
                ->toMediaCollection(User::PROFILE_PATH, config('filesystems.default'));
        }

        flash()->success('User updated successfully');

        return redirect(route('company.users.index'));
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return $this->sendMessage('User Deleted sucessfully');
    }
}
