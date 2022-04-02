<?php

namespace App\Actions;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Lorisleiva\Actions\Concerns\AsAction;

class ListSeller
{
    use AsAction;

    public function handle(): Collection
    {
        return User::all();
    }
}
