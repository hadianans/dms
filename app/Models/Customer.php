<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'created_at',
        'updated_at'
    ];

    public function order()
    {
        return $this->hasMany(Order::class);
    }
}
