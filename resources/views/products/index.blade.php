@extends('layout')

@section('title')
    <h3 align="center"><strong>Manage products</strong></h3>
@endsection

@section('content')
<h5 align="center">
    <a href="{{ url('/logout') }}" class="center">Logout</a>
    · 
    <a href="{{ route('products.create') }}" class="center">Create new product</a>
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
        <th>Detail</th>
        <th>Photo</th>
        <th>Category</th>
        <th>Price</th>
        <th>Actions</th>
    </tr>
    @php
    foreach ($products as $product) {
    $aux = false;
    
        echo "<tr>
            <td>" . ++$c . "</td>
            <td>$product->name</td>
            <td>$product->description</td>";

        for($i = 0; $i < sizeof($photo); $i++){
            if ($product->id == $photo[$i]->id_product) {
                echo '<td><img src="data:image/jpeg;base64,'.base64_encode( $photo[$i]->photo ).' " width="100" height="100"/></td>';
                $aux = true;
            }
        }

        if(!$aux){
            echo '<td>No image available</td>';
        }
        
        echo '<td>';
            
        for($g = 0; $g < sizeof($relation_categories); $g++){
            for($i = 0; $i < sizeof($category); $i++){
                if ($relation_categories[$g]->category_id == $category[$i]->id && $relation_categories[$g]->product_id == $product->id) {
                    echo $category[$i]->name . "<br>";
                }
            }
        }
        
         echo '</td>';
        
        $aux = false;
        for($i = 0; $i < sizeof($relation_rates); $i++){
            for($f = 0; $f < sizeof($rates); $f++){
                if(($relation_rates[$i]->rates_id == $rates[$f]->id) && $relation_rates[$i]->product_id == $product->id) {
                    echo "<td>" . $rates[$f]->price . "€</td>";
                    $aux = true;
                }
            }
        }
        if(!$aux){
            echo '<td></td>';
        }
        @endphp
        <td>
            <a class="btn btn-primary" href="{{ route("products.edit", $product->id )}}">Edit</a>
            <form action="{{ route('products.destroy', $product->id) }}" method="POST">
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
