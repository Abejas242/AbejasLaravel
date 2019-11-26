
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>El mundo de las abejas</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="css/welcome.css"  type="text/css">
        <link rel="stylesheet" href="css/base.css"  type="text/css">
        
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}" class="boton-w">Home</a>
                        
                    @else
                        <a href="{{ url('/login') }}" class="boton-w">Ingresar</a>
                             
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Bienvenido al mundo de las abejas
                </div>
            </div>
        </div>
    </body>
</html>