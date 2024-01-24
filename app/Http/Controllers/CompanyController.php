<?php

namespace App\Http\Controllers;

use App\Actions\Company\StoreCompany;
use App\Actions\Company\UpdateCompany;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        return view('companies.index');
    }

    public function create()
    {
        return view('companies.create');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('companies.edit', compact('user'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'email' => 'unique:users',
            'image' => 'mimes:jpg,bmp,png,jpeg,webp,gif',
            'password' => 'required',
        ]);

        StoreCompany::run($request->all());

        flash()->success("Company created successfully");

        return redirect(route('admin.companies.index'));
    }

    public function update($id, Request $request)
    {
        UpdateCompany::run($id, $request->all());
        flash()->success("User updated successfully");

        return redirect(route('admin.companies.index'));
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return $this->sendMessage("Company deleted successfully");
    }
}
