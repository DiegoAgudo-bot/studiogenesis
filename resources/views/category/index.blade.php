@extends('layout')

@section('title')
    <h3 align="center"><strong>Manage categories</strong></h3>
@endsection

@section('content')
<h5 align="center">
    <a href="{{ url('/logout') }}" class="center">Logout</a>
    · 
    <a href="{{ route('category.create') }}" class="center">Create new category</a>
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
        <th>Description</th>
        <th>Actions</th>
    </tr>
    @php
    foreach ($category as $category) {
        echo "  <tr>
                <td>" . ++$c . "</td>
                <td>$category->name</td>
                <td>$category->description</td>";

    @endphp
        <td>
            <a class="btn btn-primary" href="{{ route("category.edit", $category->id )}}">Edit</a>
            <form action="{{ route('category.destroy', $category->id) }}" method="POST">
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