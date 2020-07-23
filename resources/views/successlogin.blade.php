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
            <h3 align="center"><strong>Manage contents</strong></h3>
            <h5 align="center">Welcome, <strong style="color: red;">{{ Auth::user()->email }}</strong></h5>
            <h5 align="center"><a href="{{ url('/logout') }}" class="center">Logout</a></h5>
            
            {{-- Thanks to web.php, we can set custom routes --}}
            <div id="box--small" >
                <div class="options">
                    <h4 align="center"><a href="{{ route('users.index') }}"><i class="fas fa-user-plus fa-2x"></i></a></h4>
                </div>
            </div>

            <br>

            <div id="box--small">
                <div class="options">
                    <h4 align="center"><a href="{{ route('category.index') }}"><i class="fas fa-plus fa-2x"></i></a></h4>
                </div>
            </div>

            <br>

            <div id="box--small">
                <div class="options">
                    <h4 align="center"><a href="{{ route('products.index') }}"><i class="fas fa-cart-plus fa-2x"></i></a></h4>
                </div>
            </div>

            <br>
        </div>
    </body>
</html>
