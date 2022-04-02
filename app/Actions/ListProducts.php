<?php

namespace App\Actions;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Lorisleiva\Actions\Concerns\AsAction;

class ListProducts
{
    use AsAction;

    public function handle(): Collection
    {
        return Product::all();
    }
}
