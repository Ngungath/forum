@extends('layouts.app')

@section('content')

@include('includes.error')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">New Channel</div>

                <div class="card-body">
               <form method="post" action="{{route('channels.store')}}">
                {{csrf_field()}}
                <div class="form-group">
                    <label class="label-control">Channel title</label>
                    <input type="text" name="title" class="form-control">
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-primary" type="submit">Save Channel</button>
                    </div>
                    
                </div>
                   
               </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
