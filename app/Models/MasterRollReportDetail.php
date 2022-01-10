<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterRollReportDetail extends Model
{
    use HasFactory;
    protected $guarded = ['id'];


    public function masterRollReport(){
        return $this->belongsTo(MasterRollReport::class);
    }


    public function employee(){
        return $this->belongsTo(Employee::class,'employee_id');
    }

    public function designation(){
        return $this->belongsTo(Designation::class,'designation_id');
    }
}
