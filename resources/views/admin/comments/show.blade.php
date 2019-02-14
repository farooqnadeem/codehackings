@extends('layouts.admin')

@section('content')

    <h1>Comments</h1>

    <table class="table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Author</th>
            <th>Email</th>
            <th>Body</th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>

        </tr>
        </thead>
        <tbody>
        @if(count($comments)>0)
            @foreach($comments as $comment)
                <tr>
                    <td>{{$comment->id}}</td>
                    <td>{{$comment->author}}</td>
                    <td>{{$comment->email}}</td>
                    <td>{{ str_limit($comment->body,10) }}</td>
                    <td><a href="{{route('home.post', ['id' => $comment->post->id])}}">View Post</a> </td>
                    <td><a href="{{action('CommentRepliesController@show', ['id' => $comment->id])}}">View Replies</a> </td>
                    <td>

                        @if($comment->is_active==1)


                            {!! Form::Open(['method'=>'PATCH','action'=>['PostCommentsController@update',$comment->id]]) !!}
                            <input type="hidden" id="is_active" name="is_active" value="0">
                            <div class="form-group">
                                {!! Form::submit('Un-approve',['class'=>'btn btn-success']) !!}
                            </div>
                            {!! Form::close() !!}
                        @else


                            {!! Form::Open(['method'=>'PATCH','action'=>['PostCommentsController@update',$comment->id]]) !!}
                            <input type="hidden" id="is_active" name="is_active" value="1">
                            <div class="form-group">
                                {!! Form::submit('Approve',['class'=>'btn btn-info']) !!}
                            </div>
                            {!! Form::close() !!}

                        @endif



                    </td>
                    <td>

                        {!! Form::Open(['method'=>'DELETE','action'=>['PostCommentsController@destroy',$comment->id]]) !!}
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