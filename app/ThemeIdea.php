<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Hackathon;

class ThemeIdea extends Model
{
  protected $table = 'theme_ideas';
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'name', 'confirmed', 'hackathon_id'
    ];
  public function hackathon()
  {
    return $this->belongsTo('App\Hackathon', 'hackathon_id');
  }

}
