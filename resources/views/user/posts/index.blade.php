@extends('layouts.user')

@section('title','User')

@section('h1_title','All Posts')

@section('content')
    <div class="col-sm-2" style="background-color: lightgoldenrodyellow; border: yellow solid 3px;">
        <h3 style="text-align: center;">Filter</h3>
        {!! Form::open(['method' => 'PATCH', 'action' => ['PostController@index']]) !!}
        @if($majors)
        {!! Form::select('courses', $majors, null, ['class' => 'form-control'])!!}
        @endif
        <p></p>
        {!! Form::select('category', array(0 => 'Share', 1 => 'Ask'), null, ['class' => 'form-control'])!!}
        <p></p>
        {!! Form::select('type', $types, null, ['class' => 'form-control'])!!}
        <p></p>
        {!! Form::select('paid', array(0 => 'Free', 1 => 'Paid'), null, ['class' => 'form-control'])!!}
        <p></p>
        <div class = "form-group">
          {!! Form::submit('Update', ['class' => 'btn btn-primary btn-block col-sm-6'])!!}
          {!! Form::close() !!}
        </div>
        <p><br><br></p>
    </div>

    <div class="col-sm-9 pull-right">
        <div>
            @if($posts)
                @foreach($posts as $post)
                    @if( $post->share_or_ask == 0 )
                        <h3>{{ ucfirst($types[$post->material_type_id] ) }} to Share</h3>
                    @else
                        <h3>Ask for {{ ucfirst($types[$post->material_type_id] ) }}</h3>
                    @endif
                    <p>{{ App\Major::find($post->major_id)->name }}</p>
                    <p>Posted by {{ $users->find($post->user_id)->name }} at {{ $post->created_at }}</p>
                    <h4>{{ $post->content }}</h4>
                    <input type="checkbox" disabled
                    @if( $post->free_or_paid == 0 )
                        >
                    @else
                        checked>
                    @endif
                    Paid
                    @if($post->file_id)
                        &nbsp;&nbsp;&nbsp;&nbsp;<a href="{{ config('app.url').'/'.$files->find($post->file_id)->file }}">Click to see files</a>
                    @endif
                    @if($post->user_id == Auth::User()->id)
                        <br><br><button class="btn disabled btn-danger col-sm-4">This post is created by you</button>
                    @else
                        {!! Form::open(['method' => 'PATCH', 'action' => ['PostController@askFor', $post->id]]) !!}

                        <div class = "form-group">
                            {!! Form::submit('Ask for this item', ['class' => 'btn btn-primary col-sm-4'])!!}
                        </div>

                        {!! Form::close() !!}
                    @endif

                    <p><br><br><br></p>
                @endforeach
            @endif
        </div>
        {{ $posts->links() }}
    </div>
@endsection
