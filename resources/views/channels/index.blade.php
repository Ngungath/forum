@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">All Channels
               
<span class="pull-left"><a href="{{route('channels.create')}}"><button class="btn btn-primary btn-sm float-right">New Channel</button></a></span>
                </div>

                <div class="card-body">
                  <table class="table table-hover">
                    <thead>
                        <th>Sn</th>
                        <th>Name</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                        @if($channels->count() > 0)
                        @foreach($channels as $channel)
                        <tr>
                            <td>{{$channel->id}}</td>
                            <td>{{$channel->title}}</td>
                            <td><a href="{{route('channels.edit',['channel'=>$channel->id])}}" class="btn btn-sm btn-primary">Edit</a></td>
                            <td>
                                <form method="post" action="{{route('channels.destroy',['channel'=>$channel->id])}}">
                                    {{csrf_field()}}
                                    {{method_field('delete')}}
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                  </td>  
                                </form>
                                
                        </tr>
                        @endforeach
                        @else
                        <tr class="text-center">
                            <td colspan="4">No Channel Created</td>
                        </tr>

                        @endif
                    </tbody>
                      
                  </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
