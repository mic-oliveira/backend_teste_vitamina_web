<?php

namespace App\Actions;

use App\Models\Opportunity;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Lorisleiva\Actions\Concerns\AsAction;

class CreateOpportunity
{
    use AsAction;

    public function handle(array $opportunityData, $user_id): Opportunity
    {
        $opportunity = new Opportunity();
        $opportunity->fill($opportunityData);
        $opportunity->price = Product::find($opportunityData['product_id'])->price;
        $opportunity->seller_id = $user_id;
        $opportunity->saveOrFail();
        return $opportunity;
    }
}
