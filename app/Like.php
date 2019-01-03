<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable = ['user_id','replay_id'];

    public function user(){

    	return $this->belongsTo('App\User');
    }

    public function replay(){

    	return $this->belongsTo('App\Replay');

    }
}
