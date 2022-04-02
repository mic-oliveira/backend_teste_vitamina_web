<?php

use App\Actions\ListCustomer;
use App\Models\Customer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

it('should list customers', function() {
    $result = ListCustomer::run();
    expect($result)->toBeCollection();
    expect($result->count())->toBe(10);
})->with([
    fn() => Customer::factory()->count(10)->create()
]);

it('should return empty array with no records', function () {
    $result = ListCustomer::run();
    expect($result)->toBeCollection();
    expect($result->all())->toBe([]);
});
