<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function assistants()
    {
        return $this->hasMany(Assistant::class);
    }

    public function patients()
    {
        return $this->hasMany(Patient::class);
    }
}
