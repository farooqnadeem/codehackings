@extends('layouts.admin');
@section('content')
    <h1>Categories</h1>
    <div class="col-sm-6">

        {!!Form::Open(['method'=>'POST','action'=>'AdminCategoriesController@store','files'=>true])!!}

        <div class="form-group">
            {!! Form::label('name','Title:') !!}
            {!! Form::text('name',null,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Create Post',['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close()!!}
    </div>
    <div class="col-sm-6">

        @if($categories)

            <table class="table">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Created At</th>
                </tr>
                </thead>

                @foreach($categories as $category)

                    <tbody>
                    <tr>
                        <td>{{$category->id}}</td>
                        <td><a href="{{action('AdminCategoriesController@edit', ['id' => $category->id])}}">{{$category->name}}</a> </td>
                        <td>{{$category->created_at->diffForhumans()}}</td>
                    </tr>
                    </tbody>

                    @endforeach
            </table>

            @endif

    </div>



    @stop();