<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Inicio</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="css/home.css" type="text/css">
        <link rel="stylesheet" href="css/base.css" type="text/css">
       
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                     
                        <a href="{{ url('/logout') }}" class="boton-header"onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        Salir
                        </a>
                        <form id="logout-form" class="boton-header"action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                        </form>
                     
                </div>
            @endif
 
            <div class="content">
                <div class="logo">
                    <img src="img/abeja.png">
                </div><!--Logo-->   
                    <div>
                    
                    </div>
                <div class="title m-b-md">
                    Bee Lab
                </div>
                <div class="links">
                    <a href="{{ url('/reports') }}" class="boton-main">Reportes</a>
                    <a href="{{ url('/statistics')}}" class="boton-main">Estadísticas</a>
                    <a href="{{ url('/estimates') }}" class="boton-main">Estimaciones</a>
                    <a href="{{ url('/analysis') }}" class="boton-main">Análisis</a>
                    <a href="{{ url('/help') }}" class="boton-main">Ayudas</a>
                   
                </div>
            </div>
        </div>
    </body>
</html>
