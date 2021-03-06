@extends('layout')

@section('title')
    <h3 align="center"><strong>Manage products</strong></h3>
@endsection

@section('content')
<h5 align="center"><a href="{{ url('/logout') }}" class="center">Logout</a> · <a href="{{ route('products.index') }}" class="center">Back to products</a> · <a href="{{ url('/main') }}" class="center">Back to menu</a></h5>
<form action="{{ route('products.update', $product->id) }}" method="POST">
    @csrf
    @method("PUT")
    <div class="row">
        <div class='col-lg-12'>
            <div class="form-group">
                <strong>Name</strong>
                <input type="text" name="name" value='{{ $product->name }}' class="form-control" placeholder="Name">
            </div>
        </div>

        <div class='col-lg-12'>
            <div class="form-group">
                <strong>Description</strong>
                <input type="text" name="description" value='{{ $product->description }}' class="form-control" placeholder="Description">
            </div>
        </div>

        <div class='col-lg-12'>
            <div class="form-group">
                <strong>Photo</strong>
                <input type="file" name="photo" class="form-control">
            </div>
        </div>

        <div class='col-lg-12'>
            <div class="form-group">
                <strong>Category</strong>
                <br>
                <select name="category" id="category">
                    @foreach($category as $category)
                    <option value="{{ $category->id }}">{{$category->name }}</option>
                    @endforeach
                </select>
                
            </div>
        </div>
        
        <div class='col-lg-12'>
            <div class="form-group">
                <strong>Rates</strong>
                <br>
                <select name="rates" id="rates">
                    @foreach($rates as $rates)
                    <option value="{{ $rates->id }}">From {{ $rates->start_date }} to {{ $rates->end_date }} = {{ $rates->price }}€</option>
                    @endforeach
                </select>
            </div>
        </div>
        
        <div class='col-lg-12'>
            <button type='submit' class='btn btn-primary'>Edit</button>
        </div>
    </div>
</form>
@endsection