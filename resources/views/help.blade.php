<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Ayudas</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="css/help.css" type="text/css">   
        <link rel="stylesheet" href="css/base.css" type="text/css">
    </head>
    <body>
        <header>
            <div class="izq">
                <h3 class="titulo">Bee Lab - Ayudas</h3>
            </div>
            <div class="der">
                @if (Route::has('login'))
                <div class="top-left links">
                    <a href="{{ url('/home') }}" class="boton-header">Inicio</a>
                    <a href="{{ url('/logout') }}"  class="boton-header" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        Salir
                    </a>
                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
                @endif
            </div>
        
    </header>

    <div class="barra">
        <nav id="nav" class="navegacion-principal contenedor">
            <a href="{{ url('/reports') }}">Reportes</a>
            <a href="{{ url('/statistics') }}">Estadisticas</a>
            <a href="{{ url('/estimates') }}">Estimaciones</a>
            <a href="{{ url('/analysis') }}">Analisis</a>
            <a href="{{ url('/help') }}">Ayudas</a>
        </nav>
    </div>

    <div class="top-left">
        <div class="content">
            <div class="title m-b-md">
                Ayudas

                <script type="text/javascript">
                    
                </script>
            </div>
            <div>
                <h1>Reportes</h1>>
                <h3>
                    Para la sección de reportes va a encontrar un formulario en el que debe ingresar una fecha y con esta tiene la posibilidad de observar alguna información con respecto a la actividad de las abejas en un apiario en un formato pdf que se descargará.
                </h3>    
            </div>
            <div>
                <h1>Estadísticas</h1>>
                <h3>
                    La generación de estadísticas se realiza por medio de tres variables que tienden a ser las mas importantes para el análisis de la actividad de las abejas, Temperatura del ambiente, del apiario y la humedad, con esto, al ingresar los datos en el formulario pedido, se obtiene una gráfica con las estadísticas de actividad solicitadas, esta gráfica se puede descargar.
                </h3> 
            </div>
        </div>
    </div>

    <main>
    </main>
        
    </body>
</html>
