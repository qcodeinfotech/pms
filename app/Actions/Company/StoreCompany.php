<?php

use Lorisleiva\Actions\Concerns\AsAction;

class StoreCompany
{
    use AsAction;

    public function handle(Request $request)
    {
        dd($request);
    }
}
