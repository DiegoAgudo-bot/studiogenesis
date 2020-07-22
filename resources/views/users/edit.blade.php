@extends('layout')

@section('title')
    <h3 align="center"><strong>Manage users</strong></h3>
@endsection

@section('content')
<h5 align="center"><a href="{{ url('/logout') }}" class="center">Logout</a> · <a href="{{ route('users.index') }}" class="center">Back to users</a> · <a href="{{ url('/main') }}" class="center">Back to menu</a></h5>

<form action="{{ route('users.update', $user->id) }}" method="POST">
    @csrf
    @method('PUT');
    <div class="row">
        <div class='col-lg-12'>
            <div class="form-group">
                <strong>Name</strong>
                <input type="text" name="name" value='{{ $user->name }}' class="form-control" placeholder="Name">
            </div>
        </div>

        <div class='col-lg-12'>
            <div class="form-group">
                <strong>Surnames</strong>
                <input type="text" name="surnames" value='{{ $user->surnames }}' class="form-control" placeholder="Description">
            </div>
        </div>
        
        <div class='col-lg-12'>
            <div class="form-group">
                <strong>Email</strong>
                <input type="text" name="email" value='{{ $user->email }}' class="form-control" placeholder="Email">
            </div>
        </div>
        
        <div class='col-lg-12'>
            <div class="form-group">
                <strong>Password</strong>
                <input type="text" name="password" value='{{ $user->password }}' class="form-control" placeholder="Password">
            </div>
        </div>
        
        <div class='col-lg-12'>
            <div class="form-group">
                <strong>Photo</strong>
                <input type="file" name="photo" class="form-control">
            </div>
        </div>

        <div class='col-lg-12'>
            <button type='submit' class='btn btn-primary'>Edit</button>
        </div>
    </div>
</form>
@endsection