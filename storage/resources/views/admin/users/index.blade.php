@extends('layouts.admin')

@section('title','Admin')

@section('h1_title','All Users')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th>Id</th>
            <th>RIN</th>
            <th>Name</th>
            <th>Property</th>
            <th>Email</th>
            <th>User created at</th>
            <th></th>
        </tr>
        </thead>

        <tbody>
            @if($users)
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->rin }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ ($user->role_id > 1) ? ($user->role_id == 2 ? 'User' : 'BlockedUser') : 'Admin' }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>
                            <a href="{{ route('users.edit', $user->id) }}" class="pull-right btn btn-primary col-sm-6" style="width: 6em;">Edit User</a>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    {{ $users->links() }}
@endsection