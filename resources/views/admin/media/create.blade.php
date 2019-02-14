@extends('layouts.admin')
@section('content')

    @section('styles')
        <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet">
        @endsection

    <h1>Upload Media</h1>


     {!! Form::Open(['method'=>'POST','action'=>'AdminMediasController@store','class'=>'dropzone']) !!}

             {!! Form::close() !!}
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
    @endsection

    @endsection