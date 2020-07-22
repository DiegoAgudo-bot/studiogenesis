@extends('layout')

@section('title')
    <h3 align="center"><strong>Manage products</strong></h3>
@endsection

@section('content')
<h5 align="center"><a href="{{ url('/logout') }}" class="center">Logout</a> · <a href="{{ route('category.index') }}" class="center">Back to categories</a> · <a href="{{ url('/main') }}" class="center">Back to menu</a></h5>

@if (count($errors) > 0)
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('category.store') }}" method="POST">
    @csrf
    <div class="row">
        <div class='col-lg-12'>
            <div class="form-group">
                <strong>Name</strong>
                <input type="text" name="name" class="form-control" placeholder="Name">
            </div>
        </div>

        <div class='col-lg-12'>
            <div class="form-group">
                <strong>Description</strong>
                <input type="text" name="description" class="form-control" placeholder="Description">
            </div>
        </div>

        <div class='col-lg-12'>
            <button type='submit' class='btn btn-primary'>Create</button>
        </div>
    </div>
</form>
@endsection