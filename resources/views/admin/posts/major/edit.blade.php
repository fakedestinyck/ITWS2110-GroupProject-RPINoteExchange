@extends('layouts.admin')

@section('title','Admin')

@section('h1_title','Edit Major')
@section('content')
<div class="col-sm-12">

    @include('includes.form_error')

    {!! Form::model($major, ['method' => 'PATCH', 'action' => ['MajorController@update', $major->id]]) !!}

    {!! Form::hidden('major_id', $major->id) !!}

    <div class = "form-group">
        {!! Form::label('name', 'Major name:')!!}
        {!! Form::text('major_name',$major->name , ['class' => 'form-control'])!!}
    </div>

    <div class = "form-group">
        {!! Form::submit('Confirm', ['class' => 'btn btn-primary col-sm-6', 'style' => 'width: 6em'])!!}
    </div>

    {!! Form::close() !!}


</div>
@endsection