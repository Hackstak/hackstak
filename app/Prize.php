<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Hackathon;

class Prize extends Model
{
  protected $table = 'prizes';
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'name', 'cost_per_item', 'total_per_team', 'purchased', 'delivered', 'link', 'hackathon_id'
    ];
  public function hackathon()
  {
    return $this->belongsTo('App\Hackathon', 'hackathon_id');
  }

}
