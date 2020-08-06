<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Penyewa extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'penyewa';

    protected $guarded = [];

    public $timestamps = false;

    const CREATED_AT = 'di_buat';
    const UPDATED_AT = 'di_ubah';

    public function pemesanan(){
        return $this->hasMany(PemesananAlat::class, 'id_penyewa', 'id');
    }

    public function sendNotifyAdmin($message){
      return event(new Events\AdminNotification($message));
    }

    public function sendNotifyPemilik($message, $penyewa){
      return event(new Events\PemilikNotification($message, $penyewa));
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
