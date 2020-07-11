<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
  use Notifiable;

  protected $table = 'admin';
  protected $guarded = [];

  public $timestamps = false;

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

  public function sendNotifyPenyewa($message, $penyewa){
    return event(new Events\PenyewaNotification($message, $penyewa));
  }
}
