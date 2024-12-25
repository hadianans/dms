<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';
    protected $primaryKey = 'id';
    protected $fillable = [
        'customer_id',
        'sock_id',
        'color_id',
        'size',
        'amount',
        'price',
        'deadline',
        'note',
        'status',
        'updated_at',
        'created_at'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function sock()
    {
        return $this->belongsTo(Sock::class, 'sock_id');
    }

    public function color()
    {
        return $this->belongsTo(Color::class, 'color_id');
    }

    public function production()
    {
        return $this->hasMany(Production::class);
    }

    public function finishing()
    {
        return $this->hasMany(Finishing::class);
    }
}
