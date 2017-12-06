@extends('layouts.user')

@section('title','User')

@section('h1_title','Edit Profile')

@section('content')
    <div class="col-sm-9 pull-right">
        <div>
            <p>First Name: {{ $users->fname }}</p>
            <h4><input type="text" name="fname"></h4>

            <p>Last Name: {{ $users->lname }}</p>
            <h4><input type="text" name="lname"><br></h4>

            <p>RIN: {{ $users->rin }}</p>
            <h4><input type="text" name="rin"><br></h4>

            <p>Email: {{ $users->email }}</p>
            <h4><input type="text" name="email"><br></h4>

            <p>Password: {{ $users->password }}</p>
            <h4><input type="text" name="pw"><br></h4>

            {!! Form::open(['method' => 'PATCH', 'action' => ['PostController@hide', $post->id]]) !!}

            <div class = "form-group">
                {!! Form::submit('Delete this post', ['class' => 'btn btn-danger btn-block col-sm-6', 'style' => 'width: 10em'])!!}
            </div>

            {!! Form::close() !!}

            <p><br><br><br></p>
        </div>
        {{ $posts->links() }}
    </div>
@endsection