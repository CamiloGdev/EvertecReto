<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
//        'o_reference',
        'session_id',
        'process_url',
        'user_id',
        'status',
        'total_amount',
        'expiration',
        'transactions'
    ];

    public function user(): belongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function orderDetails(): hasMany
    {
        return $this->hasMany(OrderDetail::class);
    }
}
