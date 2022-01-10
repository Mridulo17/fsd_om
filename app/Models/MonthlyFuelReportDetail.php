<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonthlyFuelReportDetail extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function monthlyFuelReport(){
        return $this->belongsTo(MonthlyFuelReport::class);
    }

}
