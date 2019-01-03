@extends('layouts.app')

@section('content')
@if(count($discussions) > 0)
@foreach($discussions as $discussion)
            <div class="card">
                <div class="card-header"><img src="{{asset('/uploads/avatar').'/'.$discussion->user->avatar}}" style="width: 40px; height: 40px;">
                  &nbsp;&nbsp;

                <span> <b>Created by :</b> {{$discussion->user->name}} <b>,At : </b>{{$discussion->created_at->diffForHumans()}}</span>
                <a href="{{route('discussion.show',['slug'=>$discussion->slug])}}"><span class="btn btn-md btn-primary float-right">View</span></a>
                </div>

                <div class="card-body">
                    <h5 class="text-center">
                        <b> {{$discussion->title}}</b>
                    </h5>

                    {{str_limit($discussion->content,100)}}
        
                </div>
                <div class="card-footer">
                    {{$discussion->replies->count()}} Replies
                </div>
            </div>
            <br>
            <br>
            @endforeach
            <div class="text-center" style="padding-top: 10px; padding-left: 250px;">
            {{$discussions->links()}}
            </div>
            @else
             
             @section('content')
            <div class="card">
                <div class="card-header">Discussions</div>

                <div class="card-body text-center">

                <h4>No discussion created on this channel</h4>


                </div>
            </div>
@endsection


            @endif

@endsection
