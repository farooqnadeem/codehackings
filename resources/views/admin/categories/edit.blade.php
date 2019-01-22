@extends('layouts.admin')
@section('content')

    <h1>Categories</h1>
    <div class="row">
        <div class="col-sm-6">
            {!! Form::model($category,['method'=>'PATCH','action'=>['AdminCategoriesController@update',$category->id]]) !!}
            <div class="form-group">
                {!! Form::Label('name','Title') !!}
                {!! Form::text('name',null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Update Post',['class'=>'btn btn-primary col-sm-4']) !!}
            </div>
            {!! Form::close() !!}

            {!! Form::open(['method'=>'DELETE','action'=>['AdminCategoriesController@destroy',$category->id]]) !!}
            <div class="form-group">
                {!! Form::submit('Delete',['class'=>'btn btn-danger col-sm-4']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>

    @endsection