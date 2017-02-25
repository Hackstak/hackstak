<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Hackathon;

class Finance extends Model
{
  protected $table = 'finances';
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'name', 'amount', 'hackathon', 'updated_by', 'created_by'
    ];

  public function updated_by()
  {
    return $this->hasMany('App\User');
  }

  public function created_by()
  {
    return $this->hasMany('App\User');
  }

  public function hackathon()
  {
    return $this->hasMany('App\Hackathon');
  }
}
