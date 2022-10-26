<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Floor extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function bedgroups()
    {
        return $this->hasMany(BedGroup::class);
    }
}
