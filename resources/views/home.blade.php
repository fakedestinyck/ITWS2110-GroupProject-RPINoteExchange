@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome, {{ Auth::user()->name }}</div>

                <div class="panel-body">
                    @if(Auth::user()->isAdmin())
                        <a class="btn btn-lg btn-primary col-xs-5" href="{{ url('/admin') }}">
                            Admin Page
                        </a>
                    @else
                        <a class="btn btn-lg btn-primary col-xs-5" href="{{ url('/user') }}">
                            View Posts
                        </a>
                    @endif
                        <a class="btn btn-lg btn-primary col-xs-5 pull-right" href="{{ url('/admin') }}">
                            View Account
                        </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
