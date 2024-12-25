<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Finishing extends Model
{
    protected $table = 'finishing';
    protected $primaryKey = 'id';
    protected $fillable = [
        'order_id',
        'type',
        'amount',
        'date',
        'updated_at',
        'created_at'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}
