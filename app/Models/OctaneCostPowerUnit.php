<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OctaneCostPowerUnit extends Model
{
    use HasFactory;
    protected $guarded = ['id'];


    public function octaneCostReport(){
        return $this->belongsTo(OctaneCostReport::class);
    }

}
