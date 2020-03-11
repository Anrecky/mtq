<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Carbon\Carbon;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'password', 'birthdate', 'gender', 'is_admin', 'status', 'avatar', 'username', 'district'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    const DISKUALIFIKASI = 'Diskualifikasi';
    const TERVERIFIKASI = 'Terverifikasi';
    const DITUNDA = 'Ditunda';
    const BARU = 'Baru';
    const DITOLAK = 'Ditolak';
    public static $options = [self::DISKUALIFIKASI, self::TERVERIFIKASI, self::DITUNDA, self::BARU, self::DITOLAK];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'is_admin' => 'boolean',
    ];
    protected $dates = ['created_at', 'updated_at'];

    public function documents()
    {
        return $this->hasMany(Documents::class);
    }
    public function group()
    {
        return $this->belongsTo(Group::class);
    }
    public function contest()
    {
        return $this->belongsTo(Contest::class);
    }

    public function getAgeAttribute()
    {
        return Carbon::parse($this->attributes['birthdate'])->diff('2020-07-01')->format('%y tahun %m bulan %d hari');
    }
    public function getFormatedBirthDateAttribute()
    {
        return Carbon::parse($this->birthdate)->translatedFormat('d F Y');
    }

    public function setUsernameAttribute($value)
    {
        $this->attributes['username'] = strtolower($value);
    }
    public function setDistrictAttribute($value)
    {
        $this->attributes['district'] = strtolower($value);
    }

    public function scopeParticipant($query)
    {
        return $query->where('is_admin', '!==', 1);
    }
    public function scopeNewest($query)
    {
        $date = Carbon::today()->addDays(1);
        return $query->orderBy('created_at', 'desc')->where('created_at', '<=', $date);
    }
    public function setStatusAttribute($value)
    {
        $this->attributes['status'] = strtolower($value);
    }
    public function getStatusAttribute($value)
    {
        return Str::title($value);
    }
    public function getStatusColorAttribute()
    {
        switch ($this->status) {
            case 'Terverifikasi':
                return '#00a65a';
                break;
            case 'Ditolak':
                return '#212121';
                break;
            case 'Ditunda':
                return '#f39c12';
                break;
            case 'Diskualifikasi':
                return '#f56954';
                break;
            case 'Baru':
                return '#00c0ef';
                break;
            default:
                return '#000000';
                break;
        }
    }
    public function getJeniskAttribute()
    {
        if ($this->gender == 'putera') {
            return 'fas fa-male';
        }
        return 'fas fa-female';
    }
}
