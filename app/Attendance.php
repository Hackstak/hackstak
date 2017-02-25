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
        'user', 'hackathon', 'organizer', 'registered', 'accepted', 'rsvp', 'checked_in', 'team_name'
      ];

    public function user()
    {
      return $this->hasMany('App\User');
    }

    public function hackathon()
    {
      return $this->hasMany('App\Hackathon');
    }
}
