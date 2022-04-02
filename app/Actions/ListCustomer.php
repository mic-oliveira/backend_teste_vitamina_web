<?php

namespace App\Actions;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Collection;
use Lorisleiva\Actions\Concerns\AsAction;

class ListCustomer
{
    use AsAction;

    public function handle(): Collection
    {
        return Customer::all();
    }
}
