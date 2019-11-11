<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Reports</title>

        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="css/base.css" type="text/css">
        <link rel="stylesheet" href="css/report.css" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/d3js/5.12.0/d3.min.js"></script>
        <script src="js/jquery.js" type="text/javascript"></script>
        <script src="js/reports.js" type="text/javascript"></script>
    
    </head>
    <body>
        <header>
            <div class="izq">
                <h3 class="titulo">Bee Lab - Reportes</h3>
            </div>
            <div class="der">
                @if (Route::has('login'))
                <div class="top-left links">
                    <a href="{{ url('/home') }}" class="boton-header">Inicio</a>
                    <a href="{{ url('/logout') }}" class="boton-header"  onclick="event.preventDefault();
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
                    Reportes
                </div>
            </div>
        </div>

        <main> 
            <form action="{{url('/imprimirCompleto')}}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="fecha-contenedor"> 
                    <section>
                        <fieldset class="fieldset"> 
                            <legend class="leyenda">Fecha del apiario</legend>
                            <label class="fecha" for="fecha">Fecha: </label>
                            <input class="fecha" name="fecha_ingresada" id="fecha_ingresada" type="date" required>
                            <br><br>
                            <button type="submit"id="boton_general" class="boton-general">Exportar todo</button>
                            <br><br>
                        </fieldset> 
                    </section> 
                </div>
            
            
            
                
                <div class="reporte">
                    <fieldset>
                        <legend>Seleccionar franja</legend>
                        <form action="{{url('/imprimirFranja1')}}">
                            <h3>Franja - 0am a 6am</h3>
                            <button id="boton_hora_1" type="submit" class="boton-real">Exportar</button>
                        </form>
                    
                        <form action="{{url('/imprimirFranja2')}}">
                            <h3>Franja - 6am a 12pm</h3>
                            <button id="boton_hora_1" type="submit" class="boton-real">Exportar</button>
                        </form>
                    
                        <form action="{{url('/imprimirFranja3')}}">
                            <h3>Franja - 12pm a 6pm</h3>
                            <button id="boton_hora_1" type="submit" class="boton-real">Exportar</button>
                        </form>
                    
                        <form action="{{url('/imprimirFranja4')}}">
                            <h3>Franja - 6pm a 0am</h3>
                            <button id="boton_hora_1" type="submit" class="boton-real">Exportar</button>
                        </form>
                    </fieldset>                 
                </div>
            </form>
        </main>
    
        <footer>
        </footer>

    </body>
</html>
