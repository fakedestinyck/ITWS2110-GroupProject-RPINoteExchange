@extends('layouts.admin')

@section('title','Admin')

@section('h1_title','Add a Major')

@section('content')
    <div class="col-sm-12">

        @include('includes.form_error')

        {!! Form::open(['method' => 'POST', 'action' => 'MajorController@store']) !!}

        <div class = "form-group">
            {!! Form::label('name', 'Major name:')!!}
            {!! Form::text('major_name', null, ['class' => 'form-control'])!!}
        </div>

        <div class = "form-group">
            {!! Form::submit('Add', ['class' => 'btn btn-primary'])!!}
        </div>


    </div>
@endsection