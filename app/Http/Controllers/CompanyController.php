<?php

namespace App\Http\Controllers;

use App\Actions\Company\StoreCompany;
use App\Models\User;
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
            'email' => ['unique:users'],
            'password' => ['required'],
        ]);

        StoreCompany::run($request->all());

        flash()->success("Company created successfully");

        return redirect(route('admin.companies.index'));
    }
}
