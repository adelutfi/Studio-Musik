<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Pemilik extends Authenticatable
{
  use Notifiable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $table = 'pemilik';

  protected $guarded = [];

  public $timestamps = false;

  const CREATED_AT = 'di_buat';
  const UPDATED_AT = 'di_ubah';

  public function studio(){
    return $this->hasMany(Studio::class,'id_pemilik', 'id');
  }

  public function sendNotifyPenyewa($message, $penyewa){
    return event(new Events\PenyewaNotification($message, $penyewa));
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
