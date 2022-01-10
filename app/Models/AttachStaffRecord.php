<?php

namespace App\Models;

use App\Helpers\ActivityLogHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class AttachStaffRecord extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;

    protected $guarded = ['id'];
    protected $appends = ['month_name'];
    protected static $logName = 'attach_staff_record';
    protected static $logOnlyDirty = true;
    protected static $logAttributes = ['*'];
    protected static $ignoreChangedAttributes = [];

    public function getDescriptionForEvent(string $eventName): string
    {
        self::$logName = trans(self::$logName.'.attach_staff_record');
        return self::$logName .' '.ActivityLogHelper::eventName($eventName);
    }

    public static function months()
    {
        return [
            'january' => trans('attach_staff_record.january'),
            'february' => trans('attach_staff_record.february'),
            'march' => trans('attach_staff_record.march'),
            'april' => trans('attach_staff_record.april'),
            'may' => trans('attach_staff_record.may'),
            'june' => trans('attach_staff_record.june'),
            'july' => trans('attach_staff_record.july'),
            'august' => trans('attach_staff_record.august'),
            'september' => trans('attach_staff_record.september'),
            'october' => trans('attach_staff_record.october'),
            'november' => trans('attach_staff_record.november'),
            'december' => trans('attach_staff_record.december'),
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

    public function attachStaffRecordDetails(){
        return $this->hasMany(AttachStaffRecordDetail::class);
    }

    public function toAttachStaff(){
        return $this->hasMany(ToAttachStaffRecord::class);
    }
}

