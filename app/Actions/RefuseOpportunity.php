<?php

namespace App\Actions;

use App\Models\Opportunity;
use Lorisleiva\Actions\Concerns\AsAction;

class RefuseOpportunity
{
    use AsAction;

    public function handle(int $opportunity_id)
    {
        $opportunity = Opportunity::find($opportunity_id);
        $opportunity->status = 3;
        $opportunity->save();
        return $opportunity;
    }
}
