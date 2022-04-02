<?php

use App\Actions\ListProducts;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

it('should list product', function() {
    $result = ListProducts::run();
    expect($result)->toBeCollection();
    expect($result->count())->toBe(10);
})->with([
    fn() => Product::factory()->count(10)->create()
]);

it('should return empty array with no records', function () {
    $result = ListProducts::run();
    expect($result)->toBeCollection();
    expect($result->all())->toBe([]);
});
