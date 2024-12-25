<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $table = 'color';
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

    public function yarn()
    {
        return $this->hasMany(Yarn::class);
    }
}
