<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Password;

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

    public function store(Request $request)
    {
        $request->validate([
            'password' => ['required', 'confirmed'],
        ]);
    }
}
