<?php

namespace App\Http\Controllers;


use Auth;
use Session;
use App\Like;
use App\Replay;
use Illuminate\Http\Request;


class RepliesController extends Controller
{
    
    public function like($id){

     Like::create([
      'replay_id'=>$id,
      'user_id'=>Auth::id()
     ]);

     Session::flash('success','You liked the reply.');

     return redirect()->back();



    }

    public function unlike($id){
     
     $like = Like::where('replay_id',$id)->where('user_id',Auth::id())->first();

     $like->delete();

     Session::flash('success','You unliked the reply.');

     return redirect()->back();
     


    }

    public function best_answer($id){

        $reply = Replay::find($id);

        $reply->best_answer = 1;
        $reply->save();
        Session::flash('success','Marked as best answer.');
        return redirect()->back();


        

    }
}
