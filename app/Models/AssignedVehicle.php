<?php

namespace App\Models;

use App\Helpers\ActivityLogHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class AssignedVehicle extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;

    protected $guarded = ['id'];
    protected static $logName = 'assigned_vehicle';
    protected static $logOnlyDirty = true;
    protected static $logAttributes = ['*'];
    protected static $ignoreChangedAttributes = [];

    public function getDescriptionForEvent(string $eventName): string
    {
        self::$logName = trans(self::$logName.'.assigned_vehicle');
        return self::$logName .' '.ActivityLogHelper::eventName($eventName);
    }

    public function brand(){
        return $this->belongsTo(Brand::class);
    }

    public function model(){
        return $this->belongsTo(\App\Models\Model::class);
    }

    public function fire_station(){
        return $this->belongsTo(FireStation::class);
    }

    public function type(){
        return $this->belongsTo(Type::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

}
