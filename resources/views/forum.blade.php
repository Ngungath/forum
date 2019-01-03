@extends('layouts.app')

@section('content')
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
                    <span class="float-right" ><a href="" class="btn btn-primary">{{$discussion->channel->title}}</a></span>
                </div>
            </div>
            <br>
            <br>
            @endforeach
            <div class="text-center" style="padding-top: 10px; padding-left: 250px;">
            {{$discussions->links()}}
            </div>

@endsection
