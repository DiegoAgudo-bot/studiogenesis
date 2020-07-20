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
            <h3 align="center"><strong>Manage users</strong></h3>
            <h5 align="center">Welcome, <strong style="color: red;">{{ Auth::user()->email }}</strong></h5>
            <h5 align="center"><a href="{{ url('/logout') }}" class="center">Logout</a></h5>
            
            <table class='table table-bordered' border-color='black'>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Detail</th>
                    <th>Photo</th>
                    <th>Category</th>
                    <th>Rates</th>
                </tr>
                
                @foreach($products as $key => $product)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description}}</td>
                </tr>
                @endforeach
            </table>
            
        </div>
    </body>
</html>
