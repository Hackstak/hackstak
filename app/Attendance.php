<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Hackathon;

class Attendance extends Model
{
    protected $table = 'attendance';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'hackathon_id', 'organizer', 'registered', 'accepted', 'rsvp', 'checked_in', 'team_name'
      ];

    public function user()
    {
      return $this->belongsTo('App\User', 'user_id');
    }

    public function hackathon()
    {
      return $this->belongsTo('App\Hackathon', 'hackathon_id');
    }
}
