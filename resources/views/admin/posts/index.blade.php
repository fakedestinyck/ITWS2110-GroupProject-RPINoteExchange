@extends('layouts.admin')

@section('title','Admin')

@section('h1_title','All Posts')

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
                    <p>{{ $post->content }}</p>
                    <input type="checkbox" disabled
                    @if( $post->free_or_paid == 0 )
                        >
                    @else
                        checked>
                    @endif
                    Paid
                @endforeach
            @endif
        </div>
        {{ $posts->links() }}
    </div>
@endsection