<?php

namespace App\Models;

use App\Helpers\ActivityLogHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class OctaneCostReport extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;

    protected $guarded = ['id'];
    protected $appends = ['month_name'];
    protected static $logName = 'octane_cost_report';
    protected static $logOnlyDirty = true;
    protected static $logAttributes = ['*'];
    protected static $ignoreChangedAttributes = [];

    public function getDescriptionForEvent(string $eventName): string
    {
        self::$logName = trans(self::$logName.'.octane_cost_report');
        return self::$logName .' '.ActivityLogHelper::eventName($eventName);
    }

    public static function months()
    {
        return [
            'january' => trans('octane_cost_report.january'),
            'february' => trans('octane_cost_report.february'),
            'march' => trans('octane_cost_report.march'),
            'april' => trans('octane_cost_report.april'),
            'may' => trans('octane_cost_report.may'),
            'june' => trans('octane_cost_report.june'),
            'july' => trans('octane_cost_report.july'),
            'august' => trans('octane_cost_report.august'),
            'september' => trans('octane_cost_report.september'),
            'october' => trans('octane_cost_report.october'),
            'november' => trans('octane_cost_report.november'),
            'december' => trans('octane_cost_report.december'),
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
        return $this->belongsTo(Thana::class);
    }
    public function district(){
        return $this->belongsTo(District::class);
    }
    public function employee(){
        return $this->belongsTo(Employee::class);
    }
    public function designation(){
        return $this->belongsTo(Designation::class);
    }
    public function fireStation(){
        return $this->belongsTo(FireStation::class);
    }

    public function octaneCostPowerUnit(){
        return $this->hasMany(OctaneCostPowerUnit::class);
    }

    public function octaneCostReportDetails(){
        return $this->hasMany(OctaneCostReportDetail::class);
    }
}
