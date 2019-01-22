@extends('layouts.admin')


@section('content')
    <h1>Edit Posts</h1>
    <div class="row">
        <div class="col-sm-3">
            <img src="{{$post->photo->file}}" alt="" class="img-responsive">
        </div>
        <div class="col-sm-9">
        {!!Form::model($post,['method'=>'PATCH','action'=>['AdminPostsController@update',$post->id],'files'=>true])!!}


        <div class="form-group">
            {!! Form::label('title','Title:') !!}
            {!! Form::text('title',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('category_id','Category:') !!}
            {!! Form::select('category_id',[''=>'Choose Category']+$categories,null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('photo_id','Photo:') !!}
            {!! Form::file('photo_id',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('body','Description:') !!}
            {!! Form::textarea('body',null,['class'=>'form-control','row'=>3]) !!}
        </div>
        <div class="form-group col-sm-1" style="padding-left:0px;">
            {!! Form::submit('Edit Post',['class'=>'btn btn-primary']) !!}
        </div>
        {!!Form::close()!!}

         {!! Form::Open(['method'=>'DELETE','action'=>['AdminPostsController@destroy',$post->id]]) !!}
                 <div class="form-group col-sm-3 text-left" style="padding-left:20px;">
                     {!! Form::submit('Delete Post',['class'=>'btn btn-danger']) !!}
                 </div>
                 {!! Form::close() !!}
    </div>
    </div>
    <div class="row">
        @include('includes.user-form-errors')
    </div>
@stop()