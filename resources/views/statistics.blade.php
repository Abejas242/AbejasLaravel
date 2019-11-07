<!DOCTYPE html>
<?php
    $con1;
    if (empty($con1)) {
        $con1=[];
    }
    $con3;
    if (empty($con3)) {
        $con3=[];
    }
?>
<html lang="en">


    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Stadistics</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="css/base.css" type="text/css">
        <link rel="stylesheet" href="css/statistics.css" type="text/css">
        <script type="text/javascript"src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    </head>


    <body>
        <header>
            <div class="izq">
                <h3 class="titulo">Bee Lab - Estadisticas</h3>
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
                <a href="{{ url('/analysis') }}">Analisis</a>
                <a href="{{ url('/help') }}">Ayudas</a>
            </nav>
        </div>

        <div class="top-left">
            <div class="content">
                <div class="title m-b-md">
                    Estadisticas
                </div>
            </div>
        </div>

        <main>
            <div class="datos">
                <fieldset class="datos-basicos" >
                    <legend>Datos basicos</legend>
                    
                    <form id="formulario" method="POST" action="{{url('statistics')}}" > 
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <label name="temperatura">Temperatura</label>
                        <br>    
                        <input type="text" name="temperatura" id="temperatura" placeholder="Ejemplo: 30" required="required">
                        <br> <br>
                        <label name="humedad">Humedad</label>
                        <br>    
                        <input type="text" name="humedad" id="humedad" placeholder="Ejemplo: 30" required="required">
                        <br> <br>
                        <label name="temperatura-apiario">Temperatura del apiario</label>
                        <br>    
                        <input type="text" name="temperatura_apiario" id="apiario" placeholder="Ejemplo: 30" required="required">
                        <br> <br>
                        <button type="submit" name="submit" class="boton-consulta">Ver</button>
                        <br><br>
                    </form>
                </fieldset>
            </div>
            <div id="container" ><div>
                    
            <div class="grafica">
                <script type="text/javascript">
                Highcharts.chart('container', {
                                title: {
                                    text: 'Temperatura'
                                },
                    
                                yAxis: {
                                    text: 'Actividad'
                                },
                                legend: {
                                    layout: 'vertical',
                                    align: 'right',
                                    verticalAlign: 'middle'
                                },
                                plotOptions: {
                                    series: {
                                        label: {
                                            connectorAllowed: false
                                        },
                                        pointStart: 0
                                    }
                                },
                                series: [{
                                    name: 'Temperatura',
                                    data: [
                                        
                                        <?php foreach ($con1 as $c1): ?>
                                        [<?php echo $c1 ?>],
                                        <?php endforeach ?>
                                        
                                        
                                    ]
                                },{
                                    name: 'Humedad',
                                    data: [
                                        <?php foreach ($con1 as $c1): ?>
                                        [<?php echo $c1 ?>],
                                        <?php endforeach ?>
                                    ]
                                },{
                                    name: 'Temperatura apiario',
                                    data: [
                                        
                                        
                                        <?php foreach ($con3 as $c3): ?>
                                        [<?php echo $c3 ?>],
                                        <?php endforeach ?>
                                        
                                        
                                    ]
                                }],
                                responsive: {
                                    rules: [{
                                        condition: {
                                            maxWidth: 500
                                        },
                                        chartOptions: {
                                            legend: {
                                                enabled: false
                                            }
                                        }
                                    }]
                                }
                            }); 
                </script>
            </div>
        </main>
    </body>
</html>