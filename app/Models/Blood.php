<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blood extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function patients()
    {
        return $this->hasMany(Patient::class);
    }
}
