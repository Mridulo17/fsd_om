<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OperationalMaintenanceDetail extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

//    public function getDateAttribute($value){
//        return date('d-m-Y', strtotime($value));
//    }

    public function operationalMaintenanceReport(){
        return $this->belongsTo(OperationalMaintenanceReport::class);
    }


    public function fireAccidentReason(){
        return $this->belongsTo(FireAccidentReason::class,'fire_accident_reason_id');
    }

    public function damagedProperty(){
        return $this->belongsTo(DamagedProperty::class,'damaged_property_id');
    }

    public function assignedVehicle(){
        return $this->belongsTo(AssignedVehicle::class,'assigned_vehicle_id');
    }
}
