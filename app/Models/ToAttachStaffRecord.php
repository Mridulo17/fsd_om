<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToAttachStaffRecord extends Model
{
    use HasFactory;
    protected $guarded = ['id'];


    public function attachStaffRecord(){
        return $this->belongsTo(AttachStaffRecord::class);
    }

    public function toFireStation(){
        return $this->belongsTo(FireStation::class,'to_fire_station_id');
    }

    public function toDesignation(){
        return $this->belongsTo(Designation::class,'to_designation_id');
    }
    public function toDistrict(){
        return $this->belongsTo(District::class,'to_district_id');
    }
}
