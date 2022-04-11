<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'quantity',
        'salePrice'
    ];

    public function order(): belongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function product(): belongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
