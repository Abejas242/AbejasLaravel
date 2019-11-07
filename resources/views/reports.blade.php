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
            <form action="{{url('/imprimir')}}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="fecha-contenedor"> 
                <section>
                    <fieldset class="fieldset"> 
                        <legend class="leyenda">Fecha del apiario</legend>
                        <label class="fecha" for="fecha">Fecha: </label>
                        <input class="fecha" name="fecha_ingresada" id="fecha_ingresada" type="date" required>
                        <br><br>
                        <button type="submit"id="boton_general" class="boton-general">Exportar todo</button>
                    </fieldset> 
                </section> 
            </div>
    <?php 
        $apiario;
        if(empty($apiario)){
            $apiario = "No se encontro un apiario.";
        }
    ?>
            <h3>{{ $apiario }}</h3>
            

                <div class="reporte">
                <table>
                    <thead>
                        <tr>
                            <th>Id</th><th>Horario</th><th>Exportar a PDF</th>
                        </tr>
                    </thead>

                    <tr>
                        <td>1</td>
                        <td>12am - 6am</td>
                        <td><button id="boton_hora_1" type="submit" class="boton-real">Exportar</button></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>6am - 12pm</td>
                        <td><button id="boton_hora_2" type="submit" class="boton-real">Exportar</button></td></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>12pm - 6pm</td>
                        <td><button id="boton_hora_3" type="submit" class="boton-real">Exportar</button></td></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>6pm - 12am</td>
                        <td><button id="boton_hora_4" type="submit" class="boton-real">Exportar</button></td></td>
                    </tr>
                </table>
                
                </div>
                </form>
        </main>
    
        <footer>
        </footer>

    </body>
</html>
