@extends('layouts.blog-post')

@section('content')

    <!-- Blog Post -->

    <!-- Title -->
    <h1>{{$post->title}}</h1>

    <!-- Author -->
    <p class="lead">
        by <a href="#">{{$post->user->name}}</a>
    </p>

    <hr>

    <!-- Date/Time -->
    <p><span class="glyphicon glyphicon-time"></span> Posted on {{$post->created_at->diffForHumans()}}</p>

    <hr>

    <!-- Preview Image -->
    <img class="img-responsive" src="{{$post->photo->file}}" alt="">

    <hr>

    <!-- Post Content -->
   <p>{{$post->body}}</p>
    <hr>

    <!-- Blog Comments -->

    <!-- Comments Form -->
    <div class="well">
        <h4>Leave a Comment:</h4>
       <!-- <form role="form">
            <div class="form-group">
                <textarea class="form-control" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>-->
         {!! Form::Open(['method'=>'POST','action'=>'PostCommentsController@store']) !!}
        <input type="hidden" id="post_id" name="post_id" value="{{$post->id}}"/>
        <div  class="form-group">
            {!! Form::label('body','Body:') !!}
            {!! Form::textarea('body',null,['class'=>'form-control','rows'=>3]) !!}
        </div>
                 <div class="form-group">
                     {!! Form::submit('Submit Comments',['class'=>'btn btn-primary']) !!}
                 </div>
                 {!! Form::close() !!}

    </div>

    <hr>

    <!-- Posted Comments -->

    <!-- Comment -->

    @if(count($comments)>0)

        @foreach($comments as $comment)


    <div class="media">
        <a class="pull-left" href="#">
            <img class="media-object" src="http://placehold.it/64x64" alt="">
        </a>
        <div class="media-body">
            <h4 class="media-heading">{{$comment->author}}
                <small>{{$comment->created_at->diffForHumans()}}</small>
            </h4>
            <p class="text-justify">{{$comment->body}}</p>




            <!-- Nested Comment -->
            @if(count($comment->commentreply)>0)
                @foreach($comment->commentreply as $reply)

                    <div class="nested-comment media">
                        <a class="pull-left" href="#">
                            <img class="media-object" src="http://placehold.it/64x64" alt="">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">{{$reply->author}}
                                <small>{{$reply->created_at->diffForHumans()}}</small>
                            </h4>
                            <p class="text-justify">{{$reply->body}}</p>
                        </div>
                        <div class="comment-reply-container">
                            <button class="toggle-reply btn btn-primary pull-right">reply</button>
                            <div class="comment-reply">
                        {!! Form::Open(['method'=>'POST','action'=>['CommentRepliesController@createReply']]) !!}

                        <input type="hidden" id="post_id" name="comment_id" value="{{$comment->id}}"/>
                        <div class="form-group">
                            {!! Form::label('body','Body:') !!}
                            {!! Form::textarea('body',null,['class'=>'form-control','rows'=>1]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::submit('Submit',['class'=>'btn btn-primary']) !!}
                        </div>
                        {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                    <!-- End Nested Comment -->

                    @endforeach



                @endif




        </div>
    </div>
        @endforeach
    @endif

    <!-- Comment -->



@stop

@section('scripts')
    <script>

        $(".comment-reply-container .toggle-reply").click(function () {



            $(this).next().slideToggle("slow");
        });

    </script>
    @stop