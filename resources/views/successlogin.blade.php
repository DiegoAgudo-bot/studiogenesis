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
            
            .box--small{
                width:570px;
                margin:0 auto;
                border:1px solid #ccc;
            }
            
            .fas{
                size: 50px;
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
            <h5 align="center">Welcome <strong style="color: red;">{{ Auth::user()->email }}</strong></h5>
            <h5 align="center"><a href="{{ url('/logout') }}" class="center">Logout</a></h5>
            <div class="box--small">
                
                <div class="span2">
                    <h3>Users: 
                        <i class="fas fa-user-plus fa-1x"></i>
                        <i class="fas fa-user-minus fa-1x"></i>
                        <i class="fas fa-user-edit fa-1x"></i>
                    </h3>
                    
                </div>
                <div class="span2">1</div>
                <div class="span2">1</div>
                <div class="span2">1</div>
                
                <i class="fas fa-user-plus"></i>
            </div>
            <br />
        </div>
    </body>
</html>
