<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OperationSituation extends Model
{
    use HasFactory;
    protected $guarded = ['id'];


    public function situationReport(){
        return $this->belongsTo(SituationReport::class);
    }

    public function fireStation(){
        return $this->belongsTo(FireStation::class);
    }

}
