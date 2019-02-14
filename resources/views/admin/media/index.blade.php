@extends('layouts.admin')
@section('content')
    <h1>Media</h1>
    <table class="table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Created At</th>

        </tr>
        </thead>

        @if($photos)
            @foreach($photos as $photo)
                <tr>
                    <td>{{$photo->id}}</td>
                    <td>
                        <img height="50" src="{{$photo->file?$photo->file:'http://placehold.it/400x400'}}" alt="no image">
                        </td>
                    <td>{{$photo->created_at?$photo->created_at->diffForhumans():"date not available"}}</td>
                    <td>
                         {!! Form::Open(['method'=>'DELETE','action'=>['AdminMediasController@destroy',$photo->id]]) !!}
                                 <div class="form-group">
                                     {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
                                 </div>
                                 {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
            @endif
    </table>

    @endsection