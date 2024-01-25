<?php

namespace App\Actions\Company;

use Lorisleiva\Actions\Concerns\AsAction;

class CompanyDashboard
{
    use AsAction;

    public function handle()
    {
        return view('company.dashboard.index');
    }
}
