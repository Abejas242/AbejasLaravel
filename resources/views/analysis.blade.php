<!DOCTYPE html>
<?php 
    
    if (empty($con1)) {
        $con1=0;
    }
    if (empty($con11)) {
        $con11=0;
    }
    if (empty($con111)) {
        $con111=0;
    }
    if (empty($con2)) {
        $con2=0;
    }
    if (empty($con22)) {
        $con22=0;
    }
    if (empty($con222)) {
        $con222=0;
    }
    if (empty($con3)) {
        $con3=0;
    }
    if (empty($con33)) {
        $con33=0;
    }
    if (empty($con333)) {
        $con333=0;
    }
    if (empty($con4)) {
        $con4=0;
    }
    if (empty($con44)) {
        $con44=0;
    }
    if (empty($con444)) {
        $con444=0;
    }
    if (empty($con5)) {
        $con5=0;
    }
    if (empty($con6)) {
        $con6=0;
    }
    if (empty($con7)) {
        $con7=0;
    }
    if (empty($con8)) {
        $con8=0;
    }

?>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Analysis</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="css/base.css" type="text/css">
        <link rel="stylesheet" href="css/analisis.css" type="text/css">
         
        <script src="plugins/highcharts/code/highcharts.js"></script>
        <script src="plugins/highcharts/code/modules/series-label.js"></script>
        <script src="plugins/highcharts/code/modules/exporting.js"></script>
        <script src="plugins/highcharts/code/modules/export-data.js"></script>
        
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

                 
    </head>
    <body>
        <header>
            <div class="izq">
                <h3>Bee Lab - Análisis</h3>
            </div>
            <div class="der">
                @if (Route::has('login'))
                <div class="top-left links">
                    <a href="{{ url('/home') }}" class="boton-header">Inicio</a>
                    <a href="{{ url('/logout') }}" class="boton-header" onclick="event.preventDefault();
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
            <a href="{{ url('/analysis') }}">Análisis</a>
            <a href="{{ url('/help') }}">Ayudas</a>
        </nav>
    </div>

    <div class="top-left">
        <div class="content">
            <div class="title m-b-md">
                Analisis
            </div>
        </div>
    </div>

    <main>
        <div class="contenedor-principal">
            <form action="{{url('/Analysis')}}" method="POST" >

            <div class="contenedor-datos">
                <fieldset>
                    <legend class="ayuda-legend">Buscar fecha y graficar</legend>
                    <br>
                    <div id="fechaContenedor" >
                        <label class="fecha" for="fecha">Fecha:</label>
                        <input class="fecha" name="fecha_ingresada" id="fecha_ingresada" type="date" required>
                        <br><br>
                        
                        <button type="submit" id="boton_general" class="boton-general">Ver gráfica</button>
                        <br>
                    </div>

                </fieldset>
                <br><br> 
            </div>
           
                <div id="container" class="grafica">
                    <script type="text/javascript">
                            Highcharts.chart('container', {
                                    title: {
                                        text: 'Análisis estadístico de actividad'
                                    },
                                    xAxis: {
                                        categories: ['12 am - 6 am', '6 am - 12 pm', '12 pm - 6 pm', '6 pm - 12 am']
                                    },
                                    labels: {
                                        items: [{
                                            html: 'Total actividad',
                                            style: {
                                                left: '70px',
                                                top: '0px',
                                                color: ( // theme
                                                    Highcharts.defaultOptions.title.style &&
                                                    Highcharts.defaultOptions.title.style.color
                                                ) || 'black'
                                            }
                                        }]
                                    },
                                    series: [{
                                        type: 'column',
                                        name: 'Actividad',
                                        data: [<?php echo $con1 ?>, <?php echo $con2 ?>, <?php echo $con3 ?>, <?php echo $con4 ?>]
                                    }, {
                                        type: 'column',
                                        name: 'Humedad',
                                        data: [<?php echo $con111 ?>, <?php echo $con222 ?>, <?php echo $con333 ?>, <?php echo $con444 ?>]
                                    },{
                                        type: 'column',
                                        name: 'Temperatura ambiente',
                                        data: [<?php echo $con11 ?>, <?php echo $con22 ?>, <?php echo $con33 ?>, <?php echo $con44 ?>]
                                    },{
                                        type: 'column',
                                        name: 'Temperatura colmena',
                                        data: [<?php echo $con5 ?>, <?php echo $con6 ?>, <?php echo $con7 ?>, <?php echo $con8 ?>]
                                    }, {
                                        type: 'spline',
                                        name: 'Promedio',
                                        data: [1, 2.67, 3, 6.33],
                                        marker: {
                                            lineWidth: 2,
                                            lineColor: Highcharts.getOptions().colors[3],
                                            fillColor: 'white'
                                        }
                                    }]
                                });
                    </script>            
                </div>
            </form>
        </div>            
    </main>
   
    <footer>
        
    </footer>
        
    </body>
</html>
