<?php

namespace App\Models;

use App\Helpers\ActivityLogHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class MonthlyFuelReport extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;

    protected $guarded = ['id'];
    protected $appends = ['month_name'];
    protected static $logName = 'monthly_fuel_report';
    protected static $logOnlyDirty = true;
    protected static $logAttributes = ['*'];
    protected static $ignoreChangedAttributes = [];

    public function getDescriptionForEvent(string $eventName): string
    {
        self::$logName = trans(self::$logName.'.monthly_fuel_report');
        return self::$logName .' '.ActivityLogHelper::eventName($eventName);
    }

    public static function months()
    {
        return [
            'january' => trans('monthly_fuel_report.january'),
            'february' => trans('monthly_fuel_report.february'),
            'march' => trans('monthly_fuel_report.march'),
            'april' => trans('monthly_fuel_report.april'),
            'may' => trans('monthly_fuel_report.may'),
            'june' => trans('monthly_fuel_report.june'),
            'july' => trans('monthly_fuel_report.july'),
            'august' => trans('monthly_fuel_report.august'),
            'september' => trans('monthly_fuel_report.september'),
            'october' => trans('monthly_fuel_report.october'),
            'november' => trans('monthly_fuel_report.november'),
            'december' => trans('monthly_fuel_report.december'),
        ];
    }

    public static function fuelTypes()
    {
        return [
            'diesel' => trans('monthly_fuel_report.diesel'),
            'petrol' => trans('monthly_fuel_report.petrol'),
            'octane' => trans('monthly_fuel_report.octane'),
        ];
    }


    public static function findFuelType($fuel_type)
    {
        $fuel_types = self::fuelTypes();
        foreach ($fuel_types as $key=>$value){
            if($key == $fuel_type){
                return $value;
                exit();
            }
        }
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


    public function employee(){
        return $this->belongsTo(Employee::class,'employee_id');
    }
    public function designation(){
        return $this->belongsTo(Designation::class,'designation_id');
    }

    public function assignedVehicle(){
        return $this->belongsTo(AssignedVehicle::class,'assigned_vehicle_id');
    }
    public function fireStation(){
        return $this->belongsTo(FireStation::class,'fire_station_id');
    }

    public function monthlyFuelReportDetails(){
        return $this->hasMany(MonthlyFuelReportDetail::class);
    }
}
