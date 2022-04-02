<?php

namespace App\Actions;

use App\Models\Opportunity;
use Illuminate\Contracts\Pagination\Paginator;
use Lorisleiva\Actions\Concerns\AsAction;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class ListOpportunity
{
    use AsAction;

    public function handle()
    {
        return QueryBuilder::for(Opportunity::class)
            ->allowedIncludes('seller', 'product', 'customer')
            ->allowedFilters([
                AllowedFilter::partial('seller_name','seller.name'),
                AllowedFilter::scope('date_between','created_between')
            ])
            ->get();
    }
}
