<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Discussion;
use Auth;
use Illuminate\Pagination\Paginator;

class ForumsController extends Controller
{
    public function index()
    {    

    	//$discussions = Discussion::orderBy('created_at','desc')->paginate(3);

    	switch (request('filter')) {
    		case 'me':
    			$results = Discussion::where('user_id',Auth::id())->paginate(3);
    			break;
    		case 'solved':
    		$answered = array();

    		foreach (Discussion::all() as $d) {
    		   
    		   if($d->hasBestAnswer()){

    		   	array_push($answered, $d);
    		   }

    		   $results = new Paginator($answered,2);


    		}

    		break;

    		case 'unsolved':
    		$unanswered = array();

    		foreach (Discussion::all() as $d) {
    		   
    		   if(!$d->hasBestAnswer()){

    		   	array_push($unanswered, $d);
    		   }

    		   $results = new Paginator($unanswered,2);


    		}

    		break;
    		
    		default:
    			$results = Discussion::orderBy('created_at','desc')->paginate(3);
    			break;
    	}

    	return view('forum',['discussions'=>$results]);
    }
}
