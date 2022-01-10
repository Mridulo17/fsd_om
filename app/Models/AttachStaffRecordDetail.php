<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttachStaffRecordDetail extends Model
{
    use HasFactory;
    protected $guarded = ['id'];


    public function attachStaffRecord(){
        return $this->belongsTo(AttachStaffRecord::class);
    }


    public function employee(){
        return $this->belongsTo(Employee::class,'employee_id');
    }

    public function mainFireStation(){
        return $this->belongsTo(FireStation::class,'main_fire_station_id');
    }

    public function attachFireStation(){
        return $this->belongsTo(FireStation::class,'attach_fire_station_id');
    }

    public function designation(){
        return $this->belongsTo(Designation::class,'designation_id');
    }
}
