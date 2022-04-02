<?php

use App\Actions\CreateOpportunity;
use App\Models\Opportunity;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

beforeEach(function () {
    \App\Models\User::factory()->create();
});

it('should create opportunity', function ($opportunity,) {
    $result = CreateOpportunity::run($opportunity,1);
    expect($result->customer_id)->toBe(1);
    expect($result->seller_id)->toBe(1);
    expect($result->product_id)->toBe(1);
})->with([
    fn() => Opportunity::factory()->state(['price' => 6000])->makeOne()->toArray()
]);

it('should throw exception with not logged user', function ($opportunity,) {
    CreateOpportunity::run($opportunity,null);
})->with([
    fn() => Opportunity::factory()->state(['price' => 6000])->makeOne()->toArray()
])->throws(Exception::class);


