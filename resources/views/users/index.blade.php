@extends('layout')

@section('title')
    <h3 align="center"><strong>Manage users</strong></h3>
@endsection

@section('content')
<h5 align="center">
    <a href="{{ url('/logout') }}" class="center">Logout</a>
    · 
    <a href="{{ route('users.create') }}" class="center">Create new user</a>
    ·
    <a href="{{ url('/main') }}" class="center">Back to menu</a>
    
    @if($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
    @endif
    
</h5>

<table class='table table-bordered' border-color='black'>
    <tr>
        <th>No</th>
        <th>Name</th>
        <th>Surnames</th>
        <th>Email</th>
        <th>Password</th>
        <th>Photo</th>
        <th>Actions</th>
    </tr>
    @php
    foreach ($users as $users) {
        echo '<tr>
            <td>' . ++$c . '</td>
            <td>' . $users->name . '</td>
            <td>' . $users->surnames . '</td>
            <td>' . $users->email . '</td>
            <td>****</td>
            <td><img src="data:image/jpeg;base64,'.base64_encode( $users->photo ).' " width="100" height="100"/>';
    @endphp
        <td>
            <a class="btn btn-primary" href="{{ route("users.edit", $users->id )}}">Edit</a>
            <form action="{{ route('users.destroy', $users->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type='submit' class='btn btn-danger'>Delete</button>
            </form>
        </td>
        @php
    }
        @endphp
        
    </tr>
</table>
@endsection
