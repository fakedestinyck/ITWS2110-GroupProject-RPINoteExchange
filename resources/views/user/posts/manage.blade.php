@extends('layouts.user')

@section('title','User')

@section('h1_title','My Posts')

@section('content')
    <div class="col-sm-9 pull-right">
        <div>
            @if($posts)
                @foreach($posts as $post)
                    @if( $post->share_or_ask == 0 )
                        <h3>{{ ucfirst($types[$post->material_type_id] ) }} to Share</h3>
                    @else
                        <h3>Ask for {{ ucfirst($types[$post->material_type_id] ) }}</h3>
                    @endif
                    <p>Posted by {{ $users->find($post->user_id)->name }} at {{ $post->created_at }}</p>
                    <h4>{{ $post->content }}</h4>
                    <input type="checkbox" disabled
                    @if( $post->free_or_paid == 0 )
                        >
                    @else
                        checked>
                    @endif
                    Paid
                    {!! Form::open(['method' => 'PATCH', 'action' => ['PostController@hide', $post->id]]) !!}

                    <div class = "form-group">
                        {!! Form::submit('Delete this post', ['class' => 'btn btn-danger btn-block col-sm-6', 'style' => 'width: 10em'])!!}
                    </div>

                    {!! Form::close() !!}

                    <p><br><br><br></p>
                @endforeach
            @endif
        </div>
        {{ $posts->links() }}
    </div>
@endsection