<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Hackathon extends Model
{
  protected $table = 'hackathons';
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'name', 'startdate', 'enddate', 'address', 'facebook', 'twitter', 'instagram', 'created_by',
      'updated_by', 'state', 'zip', 'city', 'registration_begin', 'registration_end', 'checkin_begin',
      'checkin_end', 'current_balance'
    ];
  public function created_by()
  {
    return $this->hasMany('App\User');
  }

  public function updated_by()
  {
    return $this->hasMany('App\User');
  }
}
