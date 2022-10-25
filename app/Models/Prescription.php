<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function medicines()
    {
        return $this->hasMany(Medicine::class,'medicine_id');
    }

    public function frequency()
    {
        return $this->belongsTo(Frequency::class,'frequency_id');
    }

    public function eatingTime()
    {
        return $this->belongsTo(Eatingtime::class,'eatingtime_id');
    }

    public function quantity()
    {
        return $this->belongsTo(Quantity::class,'quantity_id');
    }

    public function quantityType()
    {
        return $this->belongsTo(QuantityType::class,'quantity_type_id');
    }
}
