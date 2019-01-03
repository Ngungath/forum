<?php

namespace App;
use Auth;

use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
    protected $fillable = ['title','content','user_id','channel_id','slug'];

    public function channel(){
      return $this->belongsTo('App\Channel');
    }

    public function user(){
      return $this->belongsTo('App\User');
    }

    public function replies(){
      return $this->hasMany('App\Replay');
    }

    public function watchers(){

      return $this->hasMany('App\Watcher');
    }

    public function is_watched_by_auth_user(){

      $watchers_id = array();

      foreach ($this->watchers as $w) {
        
        array_push($watchers_id, $w->user_id);
      }

      if (in_array(Auth::id(), $watchers_id)) {

        return true;
        
      }else{

        return false;
      }
    }
}
