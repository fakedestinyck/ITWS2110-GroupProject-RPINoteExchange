@extends('layouts.admin')

@section('title','Admin')

@section('h1_title','All Majors')
@section('content')
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Major</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @if($majors)
                @foreach($majors as $major)
                    <tr>
                        <td>{{ $major->id }}</td>
                        <td>{{ $major->name }}</td>
                        <td>
                            <a href="{{ route('majors.edit', $major->id) }}" class="pull-right btn btn-primary col-sm-6" style="width: 7em;">Edit Major</a>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    <a href="{{ route('majors.create') }}" class="pull-right btn btn-success col-sm-6" style="width: 7.5em;">Add a Major</a>
@endsection
