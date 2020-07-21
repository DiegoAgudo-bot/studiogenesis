<!DOCTYPE html>
<html>
    <head>
        <title>Diego Agudo</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script src="https://kit.fontawesome.com/62992c8b48.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <style type="text/css">
            .box{
                width:600px;
                margin:0 auto;
                border:1px solid #ccc;
            }

            #box--small{
                width:270px;
                margin:0 auto;
                border:1px solid #ccc;
                background-color: white;
            }

            .fas{
                size: 50px;
            }

            .container{
                background-color: #66e0ff;
            }
        </style>
    </head>
    <body>
        @if(!isset(Auth::user()->email))
        <script>window.location = "/";</script>
        @endif
        <br />
        <div class="container box">
            <h3 align="center"><strong>Manage products</strong></h3>
            <h5 align="center">Welcome, <strong style="color: red;">{{ Auth::user()->email }}</strong></h5>
            <h5 align="center"><a href="{{ url('/logout') }}" class="center">Logout</a> · <a href="{{ url('/logout') }}" class="center">Create new product</a> · <a href="{{ url('/main') }}" class="center">Back to menu</a></h5>

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
                    echo "<tr>
                        <td>" . ++$c . "</td>
                        <td>$product->name</td>
                        <td>$product->description</td>";

                        for($i = 0; $i < sizeof($photo); $i++){
                            if ($product->id == $photo[$i]->id_product) {
                                echo '<td><img src="data:image/jpeg;base64,'.base64_encode( $photo[$i]->photo ).' " width="100" height="100"/></td>';
                                $i = sizeof($photo);
                            } else {
                                echo '<td>No image available</td>';
                            }
                        }

                        for($i = 0; $i < sizeof($category); $i++){
                            if ($product->category == $category[$i]->id) {
                                echo "<td>". $category[$i]->name . "</td>";
                            }
                        }

                        for($i = 0; $i < sizeof($relation_rates); $i++){
                            for($f = 0; $f < sizeof($rates); $f++){
                                if(($relation_rates[$i]->rates_id == $rates[$f]->id) && $relation_rates[$i]->product_id == $product->id) {
                                    echo "<td>" . $rates[$f]->price . "€</td>";
                                    $f == sizeof($rates);
                                    $i == sizeof($relation_rates);
                                } else {
                                    echo "<td></td>";
                                }
                            }
                        }
                    }
                    @endphp
                </tr>";
            </table>
        </div>
    </body>
</html>
