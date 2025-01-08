<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    protected $table = 'employe';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'phone',
        'role',
        'status',
        'updated_at',
        'created_at'
    ];

    public function production()
    {
        return $this->hasMany(Production::class);
    }

    public function finishing()
    {
        return $this->hasMany(Finishing::class);
    }
}
