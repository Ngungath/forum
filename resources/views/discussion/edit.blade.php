@extends('layouts.app')

@section('content')
@include('includes.error')
            <div class="card">
                <div class="card-header text-center"> Update a Discussion</div>
                <div class="card-body">

                    <form method="post" action="{{route('discussion.update',['slug'=>$discussion->slug])}}">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label class="control-label">Discussion Content</label>
                            <textarea cols="5" rows="5" name="content" class="form-control">
                                {{$discussion->content}}
                            </textarea>
                            
                        </div>
                        <div class="form-group">
                            <div class="text-center">
                                <button class="btn btn-primary" type="submit">Update Discussion</button>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
@endsection
