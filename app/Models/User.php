<?php

namespace App\Models;

use App\Helpers\ActivityLogHelper;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\MailResetPasswordNotification;
use Spatie\Activitylog\Traits\LogsActivity;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, LogsActivity, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];
    protected static $logName = 'user';
    protected static $logOnlyDirty = true;
    protected static $logAttributes = ['*'];
    protected static $ignoreChangedAttributes = [];

    public function getDescriptionForEvent(string $eventName): string
    {
        self::$logName = trans(self::$logName.'.user');
        return self::$logName .' '.ActivityLogHelper::eventName($eventName);
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role(){
        return $this->belongsTo('App\Models\Role', 'role_id');
    }

    public function all_applications(){
        return $this->hasMany(Application::class,'user_id');
    }

    public function new_applications(){
        return $this->hasMany(Application::class,'user_id')->where('status','saved');
    }

    public function pending_applications(){
        return $this->hasMany(Application::class,'user_id')->where('status','pending');
    }

    public function inspection_applications(){
        return $this->hasMany(Application::class,'user_id')->where('status','inspection');
    }

    public function processing_applications(){
        return $this->hasMany(Application::class,'user_id')->where('status','processing');
    }

    public function approval_applications(){
        return $this->hasMany(Application::class,'user_id')->where('status','approval');
    }

    public function approved_applications(){
        return $this->hasMany(Application::class,'user_id')->where('status','approved');
    }

    public function returned_applications(){
        return $this->hasMany(Application::class,'user_id')->where('status','returned');
    }

    public function division(){
        return $this->belongsTo(Division::class,'division_id');
    }

    public function district(){
        return $this->belongsTo(District::class,'district_id');
    }

    public function fireStation(){
        return $this->belongsTo(FireStation::class,'fire_station_id');
    }

    public function office(){
        return $this->belongsTo(Office::class,'office_id');
    }

    public function designation(){
        return $this->belongsTo(Designation::class,'designation_id');
    }

    public function sendPasswordResetNotification($token){
        $this->notify(new MailResetPasswordNotification($token));
    }

}
