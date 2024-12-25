<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sock extends Model
{
    protected $table = 'sock';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'updated_at',
        'created_at'
    ];

    public function order()
    {
        return $this->hasMany(Order::class);
    }
}
