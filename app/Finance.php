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
      'name', 'amount', 'hackathon_id', 'updated_by', 'created_by'
    ];

  public function updatedBy()
  {
    return $this->belongsTo('App\User', 'updated_by');
  }

  public function createdBy()
  {
    return $this->belongsTo('App\User', 'created_by');
  }

  public function hackathon()
  {
    return $this->belongsTo('App\Hackathon', 'hackathon_id');
  }
}
