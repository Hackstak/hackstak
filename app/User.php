<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\School;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'first', 'last', 'username', 'user', 'admin', 'phone', 'birthdate', 'college',
        'school_year', 'updated_by', 'shirt_size', 'major', 'dietary_restrictions',
        'special_needs', 'gender', 'school'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


  public function school()
  {
    return $this->hasMany('App\School');
  }
}
