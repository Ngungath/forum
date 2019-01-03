<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\Watcher;

class WatchersController extends Controller
{
    
    public function watch($id){

    	Watcher::create([
         'discussion_id'=>$id,
         'user_id'=>Auth::id()
    	]);

    	Session::flash('success','Your are watching this discussion');
    	return redirect()->back();
    }

     public function unwatch($id){

    	$watch = Watcher::where('discussion_id',$id)->where('user_id',Auth::id());
    	$watch->delete();

    	Session::flash('success','Your are no loger watching this discussion');
    	return redirect()->back();
    }
}
