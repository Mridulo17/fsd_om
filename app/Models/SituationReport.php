<?php

namespace App\Models;

use App\Helpers\ActivityLogHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class SituationReport extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;

    protected $guarded = ['id'];
    protected $appends = ['month_name'];
    protected static $logName = 'situation_report';
    protected static $logOnlyDirty = true;
    protected static $logAttributes = ['*'];
    protected static $ignoreChangedAttributes = [];

    public function getDescriptionForEvent(string $eventName): string
    {
        self::$logName = trans(self::$logName.'.situation_report');
        return self::$logName .' '.ActivityLogHelper::eventName($eventName);
    }

    public static function months()
    {
        return [
            'january' => trans('situation_report.january'),
            'february' => trans('situation_report.february'),
            'march' => trans('situation_report.march'),
            'april' => trans('situation_report.april'),
            'may' => trans('situation_report.may'),
            'june' => trans('situation_report.june'),
            'july' => trans('situation_report.july'),
            'august' => trans('situation_report.august'),
            'september' => trans('situation_report.september'),
            'october' => trans('situation_report.october'),
            'november' => trans('situation_report.november'),
            'december' => trans('situation_report.december'),
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

    public function thana(){
        return $this->belongsTo(Thana::class,);
    }
    public function fromDistrict(){
        return $this->belongsTo(District::class,'from_district_id');
    }
    public function toDistrict(){
        return $this->belongsTo(District::class,'to_district_id');
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
    public function fromFireStation(){
        return $this->belongsTo(FireStation::class,'from_fire_station_id');
    }
    public function toFireStation(){
        return $this->belongsTo(FireStation::class,'to_fire_station_id');
    }



    public function administrativeSituation(){
        return $this->hasMany(AdministrativeSituation::class);
    }
    public function operationSituation(){
        return $this->hasMany(OperationSituation::class);
    }
    public function developmentTrainingSituation(){
        return $this->hasMany(DevelopmentTrainingSituation::class);
    }
}
