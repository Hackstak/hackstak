<?php

namespace App;
use App\Hackathon;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
  protected $table = 'foods';
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'company', 'cost_per_person', 'total_estimate', 'phone', 'contacted',
      'will_deliver', 'confirmed', 'hackathon_id'
    ];

  public function hackathon()
  {
    return $this->belongsTo('App\Hackathon', 'hackathon_id');
  }

}
