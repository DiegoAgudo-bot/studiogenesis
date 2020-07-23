<!DOCTYPE html>
<html>
    <head>
        <title>Diego Agudo</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <style type="text/css">
            .box{
                width:600px;
                margin:0 auto;
                border:1px solid #ccc;
            }
        </style>
    </head>
    <body>
        <br />
        <div class="container box">
            <h3 align="center">Diego Agudo</h3><br />

            {{-- If user is already logged, jump to menu --}}
            @if(isset(Auth::user()->email))
            <script>window.location = "/successlogin";</script>
            @endif

            {{-- If user fails to log in, return the errors --}}
            @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
            @endif

            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            {{-- Simple login form --}}
            <form method="post" action="{{ url('/checklogin') }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label>Correu</label>
                    <input type="email" name="email" class="form-control" />
                </div>
                <div class="form-group">
                    <label>Contrasenya</label>
                    <input type="password" name="password" class="form-control" />
                </div>
                <div class="form-group">
                    <input type="submit" name="login" class="btn btn-primary" value="Login" />
                </div>
            </form>
        </div>
    </body>
</html>