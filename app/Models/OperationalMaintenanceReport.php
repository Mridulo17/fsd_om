<?php

namespace App\Models;

use App\Helpers\ActivityLogHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class OperationalMaintenanceReport extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;

    protected $guarded = ['id'];
    protected $appends = ['month_name'];
    protected static $logName = 'operational_maintenance_report';
    protected static $logOnlyDirty = true;
    protected static $logAttributes = ['*'];
    protected static $ignoreChangedAttributes = [];

    public function getDescriptionForEvent(string $eventName): string
    {
        self::$logName = trans(self::$logName.'.operational_maintenance_report');
        return self::$logName .' '.ActivityLogHelper::eventName($eventName);
    }

    public static function months()
    {
        return [
            'january' => trans('operational_maintenance_report.january'),
            'february' => trans('operational_maintenance_report.february'),
            'march' => trans('operational_maintenance_report.march'),
            'april' => trans('operational_maintenance_report.april'),
            'may' => trans('operational_maintenance_report.may'),
            'june' => trans('operational_maintenance_report.june'),
            'july' => trans('operational_maintenance_report.july'),
            'august' => trans('operational_maintenance_report.august'),
            'september' => trans('operational_maintenance_report.september'),
            'october' => trans('operational_maintenance_report.october'),
            'november' => trans('operational_maintenance_report.november'),
            'december' => trans('operational_maintenance_report.december'),
        ];
    }


    public static function findMonth($month)
    {
        $months = self::months();
        foreach ($months as $key=>$value){
            if($key == $month){
                return $value;
                exit();
            }
        }
    }

    public function getMonthNameAttribute(){
        return self::findMonth($this->month);
    }

    public function toDistrict(){
        return $this->belongsTo(District::class,'to_district_id');
    }
    public function fromDistrict(){
        return $this->belongsTo(District::class,'from_district_id');
    }
    public function toEmployee(){
        return $this->belongsTo(Employee::class,'to_employee_id');
    }
    public function fromEmployee(){
        return $this->belongsTo(Employee::class,'from_employee_id');
    }
    public function toDesignation(){
        return $this->belongsTo(Designation::class,'to_designation_id');
    }
    public function fromDesignation(){
        return $this->belongsTo(Designation::class,'from_designation_id');
    }
    public function toFireStation(){
        return $this->belongsTo(FireStation::class,'to_fire_station_id');
    }
    public function fromFireStation(){
        return $this->belongsTo(FireStation::class,'from_fire_station_id');
    }

    public function operationalMaintenanceDetails(){
        return $this->hasMany(OperationalMaintenanceDetail::class);
    }
}
