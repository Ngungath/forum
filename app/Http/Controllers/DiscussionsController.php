<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Session;
use App\Replay;
use Notification;
use App\Discussion;
use Illuminate\Http\Request;

class DiscussionsController extends Controller
{

	public function index(){
		$discussion = Discussion::all()->paginate(3);
       return view('discussion.index',['discussion'=>$discussion]);
     
	}

    public function create(){
    	return view('discussion');
    }

    public function store(){
    	$r = request();
    	$this->validate($r,[
         'title'=>'required',
         'channel_id'=>'required',
         'content'=>'required',
    	]);

    	$discussion = Discussion::create([
         'title'=>$r->title,
         'content'=>$r->content,
         'user_id'=>Auth::id(),
         'slug'=>str_slug($r->title),
         'channel_id'=>$r->channel_id
    	]);

    	Session::flash('success','Discussion Create Successfully.');
    	return redirect()->route('discussion.show',['slug'=>$discussion->slug]);

    }

    public function show($slug){

    	$discussion = Discussion::where('slug',$slug)->first();
        $reply_best = $discussion->replies()->where('best_answer',1)->first();
       dd($reply_best->best_answer);

    	return view('discussion.show')->with('discussion',$discussion)->with('reply_best',$reply_best);
    }

    public function reply($id){
        
        $discussion = Discussion::find($id);

    	$reply = Replay::create([
           'content'=>request()->reply,
           'user_id'=>Auth::id(),
           'discussion_id'=>$id

    	]);
      


        $watchers = array();

    	foreach ($discussion->watchers as $watcher) {
    		array_push($watchers, User::find($watcher->user_id));
    	}
      Notification::send($watchers,new \App\Notifications\NewReplyAdded($discussion));
    	


    	Session::flash('success','Reply Created Successfully');

    	return redirect()->back();
    	//route('discussion.show',['slug'=>$discussion->slug]);

    }
}
