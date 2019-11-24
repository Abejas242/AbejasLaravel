<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Estimaciones</title>

        <!-- Fonts -->
        
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="css/estimates.css" type="text/css">
        <link rel="stylesheet" href="css/base.css" type="text/css">
        <script type="text/javascript"src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        
    </head> 

    <body>
        <header>
            <div class="izq">
                <h3>Bee Lab - Estimaciones</h3>
            </div> 
            <div class="der">
                @if (Route::has('login'))
                <div class="top-left links">
                    <a href="{{ url('/home') }}" class="boton-header">Inicio</a>
                    <a href="{{ url('/logout') }}"  class="boton-header"onclick="event.preventDefault();
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
                    Estimaciones
                </div>
            </div>
        </div>

        <main>
            <div class="datos">
            <p class="ayuda">Ingrese los datos del clima sobre el cual desea estimar la actividad de las abejas</p>
                <fieldset class="datos-basicos" >
                    <legend class="titulo-legend">Datos climaticos a ingresar</legend>
                    
                    <form action="{{url('/estimar')}}" > 
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <label name="temperatura">Temperatura </label>
                        <br>    
                        <input type="text" name="temperatura" id="temperatura" placeholder="Ejemplo: 30"
                                pattern="[0-9]+" title = "Solo ingresar numeros." required>
                        <br> <br>
                        <label name="humedad">Humedad</label>
                        <br>    
                        <input type="text" name="humedad" id="humedad" placeholder="Ejemplo: 30"  
                            pattern="[0-9]+" title = "Solo ingresar numeros." required>
                        <br> <br>
                        <button type="submit" name="submit" class="submit" action="{{url('/estimar')}}" >Consultar</button>
                        <br><br>
<?php 
    $enunciado;
    if(empty($enunciado)){
        $enunciado = " ";
    }else if($enunciado = "1"){
        $enunciado = "No se encontro apiarios con datos relacionados.";
    }else if($enunciado = "2"){
        $enunciado = "La actividad de las abejas con el clima ingresado es aproximadamente = {{ $actividadTotal }}";
    }
?>
                        <h3>.{{ enunciado }}</h3>
                    </form>
                </fieldset>
            </div>
        </main>
    </body>
</html>

