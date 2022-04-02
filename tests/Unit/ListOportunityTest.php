<?php

use App\Actions\ListOpportunity;
use App\Models\Opportunity;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

it('should list opportunity', function() {
    $result = ListOpportunity::run();
    expect($result)->toBeCollection();
    expect($result->count())->toBe(10);
})->with([
    fn() => Opportunity::factory()->state(['price' => 5000])->count(10)->create()
]);

it('should return empty array with no records', function () {
    $result = ListOpportunity::run();
    expect($result)->toBeCollection();
    expect($result->all())->toBe([]);
});
