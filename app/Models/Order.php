<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'email',
        'name',
        'order_date',
        'order_number',
        'order_status',
        'order_processed_date',
        'total_amount',
        'shipping_address_id',
        'is_cancel',
        'cancel_reason',
        'cancel_by',
        'payment_status',
        'status'
    ];
}
