@extends('layouts.app')

@section('content')

@include('includes.error')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Channel</div>

                <div class="card-body">
               <form method="post" action="{{route('channels.update',['id'=>$channel->id])}}">
                {{csrf_field()}}
                {{method_field('put')}}
                <div class="form-group">
                    <label class="label-control">Channel title</label>
                    <input type="text" name="title" value="{{$channel->title}}" class="form-control">
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-primary" type="submit">Update Channel</button>
                    </div>
                    
                </div>
                   
               </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
