<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Yarn extends Model
{
    protected $table = 'yarn';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'color_id',
        'weight',
        'price',
        'note',
        'date',
        'updated_at',
        'created_at'
    ];

    public function color()
    {
        return $this->belongsTo(Color::class, 'color_id');
    }
}
