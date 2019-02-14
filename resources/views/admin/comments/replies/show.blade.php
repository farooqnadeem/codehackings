@extends('layouts.admin')

@section('content')

    <h1>Replies</h1>

    <table class="table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Author</th>
            <th>Email</th>
            <th>Body</th>
            <th></th>



        </tr>
        </thead>
        <tbody>
        @if(count($replies)>0)
            @foreach($replies as $reply)
                <tr>
                    <td>{{$reply->id}}</td>
                    <td>{{$reply->author}}</td>
                    <td>{{$reply->email}}</td>
                    <td>{{ str_limit($reply->body,10) }}</td>


                    <td>

                        {!! Form::Open(['method'=>'DELETE','action'=>['CommentRepliesController@destroy',$reply->id]]) !!}
                        <div class="form-group">
                            {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>

@endsection