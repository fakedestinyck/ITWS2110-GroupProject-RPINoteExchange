@extends('layouts.user')

@section('title','User')

@section('h1_title','Edit Profile')

@section('content')
    <div class="col-sm-12">
        @include('includes.form_error')
            {!! Form::model($user,['method'=> 'PATCH', 'action' => ['UserController@update',$user->id], 'files' => true]) !!}
            {!! Form::hidden('user_id', $user->id) !!}
            <div>

                <div class = "form-group">
                    {!! Form::label('name', 'Name:')!!}
                    {!! Form::text('name', null, ['class' => 'form-control'])!!}
                </div>

                <div class = "form-group">
                    {!! Form::label('rin', 'RIN:')!!}
                    {!! Form::text('rin', null, ['class' => 'form-control'])!!}
                </div>

                <div class = "form-group">
                    {!! Form::label('email', 'Email:')!!}
                    {!! Form::email('email', null, ['class' => 'form-control'])!!}
                </div>

                <div class = "form-group">
                    {!! Form::label('password', 'Password: (if you want to reset)')!!}
                    {!! Form::password('password', ['class' => 'form-control', 'id' => 'password', 'name' => 'password'])!!}
                </div>

                <div class = "form-group">
                    {!! Form::label('password-confirm', 'Confirm Password:')!!}
                    {!! Form::password('password-confirm', ['class' => 'form-control', 'id' => 'password-confirm', 'name' => 'password_confirmation'])!!}
                </div>

                <div class = "form-group">
                    {!! Form::submit('Confirm', ['class' => 'btn btn-primary col-sm-6', 'style' => 'width: 6em'])!!}
                </div>

                {!! Form::close() !!}
            </div>
    </div>
@endsection

