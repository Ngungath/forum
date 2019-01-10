@extends('layouts.app')

@section('content')
@include('includes.error')
            <div class="card">
                <div class="card-header text-center"> Edit Reply</div>
                <div class="card-body">

                    <form method="post" action="{{route('reply.update',['id'=>$reply->id])}}">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label class="control-label">Reply Content</label>
                            <textarea cols="5" rows="5" name="content" class="form-control">
                                {{$reply->content}}
                            </textarea>
                            
                        </div>
                        <div class="form-group">
                            <div class="text-center">
                                <button class="btn btn-primary" type="submit">Update reply</button>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
@endsection
