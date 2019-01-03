@extends('layouts.app')

@section('content')
            <div class="card">
            <div class="card-header"><img src="{{asset('/uploads/avatar').'/'.$discussion->user->avatar}}" style="width: 40px; height: 40px;">
                  &nbsp;&nbsp;

                <span> <b>Created by :</b> {{$discussion->user->name}} <b>({{$discussion->user->points}})</b>
                </span>
                @if($discussion->is_watched_by_auth_user())
                <a href="{{route('discussion.unwatch',['id'=>$discussion->id])}}"><span class="badge badge-primary float-right">UnWatch</span></a>
                @else
                  <a href="{{route('discussion.watch',['id'=>$discussion->id])}}"><span class="badge badge-primary float-right">Watch</span></a>
                @endif
                </div>

                <div class="card-body">
                	<h5 class="text-center">
                        <b> {{$discussion->title}}</b>
                    </h5>
                    <hr>

                	{{ $discussion->content }}

                    @if(isset($reply_best))
                    <hr> 
                    <div class="text-center">
                     <b>Best Answer</b> 
                    </div>
                   
                    @if($reply_best->best_answer)
                    <div class="card text-white bg-success mb-3">
                      <div class="card-header card-primary">
                        <div class="text-center">
                          <b>By : </b>{{$reply_best->user->name}}<b> ({{$reply_best->user->points}})</b>
                          
                        </div>
                      </div>
                        <div class="card-body">
                            {{$reply_best->content}}                            
                          </div>                      
                    </div>
                    @endif
                    @endif
                    
                </div>
                <div class="card-footer">
                  <span class="badge badge-primary">
                    {{$discussion->replies->count()}} Replies
                  </span>
                </div>
            </div>
            <br>


          <!-- Replies Cards -->
  @foreach($discussion->replies as $reply)
  <div class="card">
     <div class="card-header"><img src="{{asset('/uploads/avatar').'/'.$reply->user->avatar}}" style="width: 40px; height: 40px;">
                  &nbsp;&nbsp;
              <span> <b>Created by :</b> {{$reply->user->name}} <b>({{$reply->user->points}})</b></span>
                 @if(!isset($reply_best))
                 @if(Auth::id() == $reply->user->id)
                <a href="{{route('reply.best.answer',['id'=>$reply->id])}}" class="badge badge-primary float-right">Mark as best answer</a>
                @endif
                @endif
                </div>
                <div class="card-body">
                	{{ $reply->content }} 
                </div>
                <div class="card-footer">
                	@if($reply->is_liked_by_auth_user())
                	 <a href="{{route('reply.unlike',['id'=>$reply->id])}}" class="badge badge-danger">Unlike <span class="badge badge-light">{{$reply->likes->count()}}</span></a>
                   @else

                   <a href="{{route('reply.like',['id'=>$reply->id])}}" class="badge badge-
                    ">Like <span class="badge badge-light">{{$reply->likes->count()}}</span></a>
                     
                   @endif
                </div>
            </div>
            <br>
  @endforeach
  <br>
  @if(Auth::check())
  <div class="card">
  	<div class="card-body">
  		<form method="post" action="{{route('discussion.reply',['id'=>$discussion->id])}}">
  			{{csrf_field()}}
  			<div class="form-group">
  				<textarea class="form-control" name="reply" id="reply" rows="5" cols="5">
  				</textarea>
  			</div>
  			<div class="text-center">
  				<button type="submit" class="btn btn-primary">Submit</button>
  				
  			</div>
  			
  		</form>
  		
  	</div>
  	
  </div>
  @else
  <div class="text-center">

  	<h4>Please login to leave a reply .</h4>
  	
  </div>
  @endif

@endsection

       