<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Hackathon;

class TechTalk extends Model
{
  protected $table = 'tech_talks';
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'name', 'start_time', 'end_time', 'presenter', 'confirmed', 'hackathon_id'
    ];
  public function hackathon_id()
  {
    return $this->hasMany('App\Hackathon');
  }

}
