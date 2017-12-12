@extends('layouts.user')

@section('title','User')

@section('h1_title','User Dashboard')

@section('content')
<div class="col-sm-5">
    <h3>Recent requested by other users</h3>
    <p><br></p>
    @if($postsRequested)
        @foreach($postsRequested as $post)
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
                <br><button class="btn disabled btn-warning col-sm-10">This item is requested by<br>another user ( {{ App\User::find($post->requestedBy)->name }}<br>Email address: {{ App\User::find($post->requestedBy)->email }} )</button>
            </div>

            <p><br><br><br></p>
        @endforeach
    @endif
</div>

<div class="col-sm-5 pull-right">
    <h3>Recent Posts</h3>
    <p><br></p>
    @if($postsRecent)
        @foreach($postsRecent as $post)
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

            {{--TODO: view file option--}}
            @if($post->user_id == Auth::User()->id)
                <br><br><button class="btn disabled btn-danger col-sm-10">This post is created by you</button>
            @else
                {!! Form::open(['method' => 'PATCH', 'action' => ['PostController@askFor', $post->id]]) !!}

                <div class = "form-group">
                    {!! Form::submit('Ask for this item', ['class' => 'btn btn-primary col-sm-10'])!!}
                </div>

                {!! Form::close() !!}
            @endif

            <p><br><br><br></p>
        @endforeach
    @endif
</div>
@endsection