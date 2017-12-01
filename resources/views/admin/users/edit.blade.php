@extends('layouts.admin')

@section('title','Admin')

@section('h1_title','Edit User')

@section('content')

    <div class="col-sm-12">

        @include('includes.form_error')

        {!! Form::model($user, ['method' => 'PATCH', 'action' => ['AdminUsersController@update', $user->id]]) !!}

        {!! Form::hidden('user_id', $user->id) !!}

        <div class = "form-group">
            {!! Form::label('rin', 'RIN:')!!}
            {!! Form::text('rin', null, ['class' => 'form-control'])!!}
        </div>

        <div class = "form-group">
            {!! Form::label('name', 'Name:')!!}
            {!! Form::text('name', null, ['class' => 'form-control'])!!}
        </div>

        <div class = "form-group">
            {!! Form::label('email', 'Email:')!!}
            {!! Form::email('email', null, ['class' => 'form-control'])!!}
        </div>

        <div class = "form-group">
            {!! Form::label('role_id', 'Property:')!!}
            {!! Form::select('role_id', $roles, null, ['class' => 'form-control'])!!}
        </div>

        <div class = "form-group">
            {!! Form::submit('Confirm', ['class' => 'btn btn-primary col-sm-6', 'style' => 'width: 6em'])!!}
        </div>

        {!! Form::close() !!}

        {!! Form::open(['method' => 'DELETE', 'action' => ['AdminUsersController@destroy', $user->id], 'class' => 'pull-right']) !!}

        <div class = "form-group">
            {!! Form::submit('Delete User', ['class' => 'btn btn-danger col-sm-6', 'style' => 'width: 8em'])!!}
        </div>

        {!! Form::close() !!}


    </div>
@endsection