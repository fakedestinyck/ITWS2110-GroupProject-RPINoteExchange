@extends('layouts.user')

@section('title','User')

@section('h1_title','My Posts')

@section('content')
    <div class="col-sm-10 pull-right">
        <a href="{{ route('posts.create') }}" class=" btn btn-success col-sm-6" style="width: 10em;">Create New Post</a><br><br>
        <div>
            @if($posts)
                @foreach($posts as $post)
                    @if( $post->share_or_ask == 0 )
                        <h3>{{ ucfirst($types[$post->material_type_id] ) }} to Share</h3>
                    @else
                    <h3>Ask for {{ ucfirst($types[$post->material_type_id] ) }}</h3>
                    @endif
                    <p>{{ App\Major::find($post->major_id)->name }}</p>
                    <p>Posted by me at {{ $post->created_at }}</p>
                    <h4>{{ $post->content }}</h4>
                    <input type="checkbox" disabled
                    @if( $post->free_or_paid == 0 )
                        >
                    @else
                        checked>
                    @endif
                    Paid

                    <div class = "form-group">
                        @if($post->is_shown == 0)
                            <br><button class="btn disabled btn-danger col-sm-6">This post is deleted either by you or by admin</button>
                        @elseif($post->requestedBy != NULL)
                            <br><button class="btn disabled btn-warning col-sm-6">This item is requested by<br>another user ( {{ App\User::find($post->requestedBy)->name }}<br>Email address: {{ App\User::find($post->requestedBy)->email }} )</button>
                        @else
                            <br>
                            {!! Form::open(['method' => 'GET', 'action' => ['PostController@edit', $post->id]]) !!}
                            {!! Form::submit('Edit this post', ['class' => 'btn btn-primary col-sm-6'])!!}
                            {!! Form::close() !!}
                        @endif

                    </div>

                    <p><br><br><br></p>
                @endforeach
            @endif

        </div>
        {{ $posts->links() }}
    </div>
@endsection