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
      'checkin_end', 'current_balance', 'website'
    ];
  public function createdBy()
  {
    return $this->belongsTo('App\User', 'created_by');
  }

  public function updatedBy()
  {
    return $this->belongsTo('App\User', 'created_by');
  }
}
