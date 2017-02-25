<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Hackathon;

class Sponsor extends Model
{
  protected $table = 'sponsors';
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'name', 'contribution', 'confirmed', 'contacted', 'phone', 'email', 'hackathon_id'
    ];
    
  public function hackathon_id()
  {
    return $this->hasMany('App\Hackathon');
  }
}
