<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documents extends Model
{
    public $fillable = ['name', 'types', 'old_name'];

    const SMANDAT = 'surat_mandat';
    const KTP = 'ktp';
    const KK = 'kk';
    const IJAZAH = 'ijazah';
    const SERTIFIKAT = 'sertifikat';
    const FOTO = 'foto';
    public static $options = [self::SMANDAT, self::KTP, self::KK, self::IJAZAH, self::SERTIFIKAT, self::FOTO];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function scopeParticipant($query)
    {
        return $query->whereHas('user', function ($q) {
            $q->participant();
        });
    }
    public function scopeLatest($query)
    {
        $date = Carbon::today()->addDays(1);
        return $query->participant()->orderBy('created_at', 'desc')->where('created_at', '<=', $date);
    }
}
