@extends('layouts.user')

@section('title','User')

@section('h1_title','Create New Post')

@section('content')


    <div class="col-sm-12">

        @include('includes.form_error')

        {!! Form::open(['method' => 'POST', 'action' => 'PostController@store', 'files' => true]) !!}

        <div class = "form-group">
            {!! Form::label('name', 'Major')!!}
            {!! Form::select('major_id', $majors, null, ['class' => 'form-control'])!!}
        </div>

        <div class = "form-group">
            {!! Form::label('share_or_ask', 'Share or Ask:')!!}
            {!! Form::select('share_or_ask', array(0 => 'Share', 1=>'Ask'), null, ['class' => 'form-control'])!!}
        </div>

        <div class = "form-group">
            {!! Form::label('material_type_id', 'Free or Paid:')!!}
            {!! Form::select('material_type_id', $types, null, ['class' => 'form-control'])!!}
        </div>

        <div class = "form-group">
            {!! Form::label('free_or_paid', 'Free or Paid:')!!}
            {!! Form::select('free_or_paid', array(0 => 'Free', 1=>'Paid'), null, ['class' => 'form-control'])!!}
        </div>

        <div class = "form-group">
            {!! Form::label('content', 'Description:')!!}
            {!! Form::text('content', null, ['class' => 'form-control'])!!}
        </div>

        <div class = "form-group">
            {!! Form::label('file_id', 'File(s) (?):')!!}
            {!! Form::file('file_id', null, ['class' => 'form-control'])!!}
        </div>

        <div class = "form-group">
            {!! Form::submit('Submit', ['class' => 'btn btn-primary'])!!}
        </div>


    </div>

@endsection