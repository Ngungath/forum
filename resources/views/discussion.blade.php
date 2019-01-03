@extends('layouts.app')

@section('content')
@include('includes.error')
            <div class="card">
                <div class="card-header text-center"> Create a new Discussion</div>
                <div class="card-body">

                    <form method="post" action="{{route('discussion.store')}}">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Select Cahnnel</label>
                            <select name="channel_id" class="form-control">
                                @foreach($channels as $channel)
                                <option value="{{$channel->id}}">{{$channel->title}}</option>
                                @endforeach    
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Discussion Content</label>
                            <textarea cols="5" rows="5" name="content" class="form-control">
                                
                            </textarea>
                            
                        </div>
                        <div class="form-group">
                            <div class="text-center">
                                <button class="btn btn-primary" type="submit">Create Discussion</button>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
@endsection
