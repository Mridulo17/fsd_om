<?php

namespace App\Models;

use App\Helpers\ActivityLogHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class MasterRollReport extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;

    protected $guarded = ['id'];
    protected $appends = ['month_name'];
    protected static $logName = 'master_roll_report';
    protected static $logOnlyDirty = true;
    protected static $logAttributes = ['*'];
    protected static $ignoreChangedAttributes = [];

    public function getDescriptionForEvent(string $eventName): string
    {
        self::$logName = trans(self::$logName.'.master_roll_report');
        return self::$logName .' '.ActivityLogHelper::eventName($eventName);
    }

    public static function months()
    {
        return [
            'january' => trans('master_roll_report.january'),
            'february' => trans('master_roll_report.february'),
            'march' => trans('master_roll_report.march'),
            'april' => trans('master_roll_report.april'),
            'may' => trans('master_roll_report.may'),
            'june' => trans('master_roll_report.june'),
            'july' => trans('master_roll_report.july'),
            'august' => trans('master_roll_report.august'),
            'september' => trans('master_roll_report.september'),
            'october' => trans('master_roll_report.october'),
            'november' => trans('master_roll_report.november'),
            'december' => trans('master_roll_report.december'),
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
    public function thana(){
        return $this->belongsTo(Thana::class,);
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

    public function masterRollReportDetails(){
        return $this->hasMany(MasterRollReportDetail::class);
    }
}
