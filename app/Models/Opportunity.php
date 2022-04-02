<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Opportunity extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'status',
        'customer_id',
        'seller_id',
        'product_id',
        'price'
    ];

    public function scopeCreatedBetween($query, $start_date = null,$end_date = null)
    {
        return $query->whereDate('created_at', '>=', $start_date ?? now()->toDateString())
            ->whereDate('created_at', '<=', $end_date ?? now()->toDateString());
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function seller(): BelongsTo
    {
        return $this->belongsTo(Seller::class, 'seller_id');
    }

}
