@extends('layouts.user')

@section('title','User')

@section('h1_title','Profile Information')

@section('content')
    <div class="col-sm-9 pull-right">
        <div>
            <p>Name: {{ $user->name }}</p>

            <p>RIN: {{ $user->rin }}</p>

            <p>Email: {{ $user->email }}</p>

            <div class = "form-group">
                <a class = "btn btn-primary btn-block col-sm-6" style='width:10em' href="{{ route('user.profile.edit') }}">Edit Information</a>
            </div>

            {!! Form::close() !!}

            <p><br><br><br></p>
        </div>
    </div>
@endsection