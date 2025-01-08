<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Production extends Model
{
    protected $table = 'production';
    protected $primaryKey = 'id';
    protected $fillable = [
        'order_id',
        'employe_id',
        'amount',
        'shift',
        'date',
        'updated_at',
        'created_at'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function employe()
    {
        return $this->belongsTo(Employe::class, 'employe_id');
    }
}
