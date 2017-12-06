@extends('layouts.user')

@section('title','User')

@section('h1_title','Profile Information')

@section('content')
    <div class="col-sm-9 pull-right">
        <div>
            <p>First Name: {{ $users->find($post->user_id)->name }}</p>
            <h4>{{ $post->content }}</h4>

            <p>Last Name: {{ $users->find($post->user_id)->name }}</p>
            <h4>{{ $post->content }}</h4>

            <p>RIN: {{ $users->find($post->user_id)->name }}</p>
            <h4>{{ $post->content }}</h4>

            <p>Email: {{ $users->find($post->user_id)->name }}</p>
            <h4>{{ $post->content }}</h4>

            <p>Password: {{ $users->find($post->user_id)->name }}</p>
            <h4></h4>

            <div class = "form-group">
                {!! Form::submit('Edit Information', ['class' => 'btn btn-danger btn-block col-sm-6', 'style' => 'width: 10em'])!!}
            </div>

            {!! Form::close() !!}

            <p><br><br><br></p>
            @endforeach
        @endif
        </div>
        {{ $posts->links() }}
    </div>
@endsection