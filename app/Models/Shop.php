<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Shop extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name', 'email', 'website', 'mobile_number', 'description', 'status', 'created_by'
    ];

    public function products(): HasMany
    {
        return $this->hasMany(ShopProduct::class, 'shop_id', 'id');
    }

    public function addresses(): HasMany
    {
        return $this->hasMany(ShopAddress::class, 'shop_id', 'id');
    }
}
