<?php

namespace App\Models;

use App\Helpers\ActivityLogHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class District extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;

    protected $guarded = ['id'];
    protected static $logName = 'district';
    protected static $logOnlyDirty = true;
    protected static $logAttributes = ['*'];
    protected static $ignoreChangedAttributes = [];

    public function getDescriptionForEvent(string $eventName): string
    {
        self::$logName = trans(self::$logName.'.district');
        return self::$logName .' '.ActivityLogHelper::eventName($eventName);
    }

    public function designation(){
        return $this->belongsTo(Designation::class);
    }

    public function division(){
        return $this->belongsTo(Division::class);
    }

    public function greater_district(){
        return $this->belongsTo(GreaterDistrict::class);
    }

}
