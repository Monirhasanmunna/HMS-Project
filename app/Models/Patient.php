<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function diseases()
    {
        return $this->belongsToMany(Disease::class);
    }

    public function prescriptionDetails()
    {
        return $this->belongsTo(PrescriptionDetails::class);
    }

    public function bedgroup()
    {
        return $this->belongsTo(BedGroup::class,'bedgroup_id');
    }

    public function bed()
    {
        return $this->belongsTo(Bed::class,'bed_id');
    }
}
