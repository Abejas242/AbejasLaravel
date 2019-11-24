<!DOCTYPE html>
<?php
    if (empty($con1)) {
        $con1=[];
    }

    if (empty($con3)) {
        $con3=[];
    }
    if (empty($con2)) {
        $con2=[];
    }
    if (empty($x)) {
        $x="";
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
        <script src="plugins/highcharts/code/highcharts.js"></script>
        <script src="plugins/highcharts/code/modules/series-label.js"></script>
        <script src="plugins/highcharts/code/modules/exporting.js"></script>
        <script src="plugins/highcharts/code/modules/export-data.js"></script>
        <script type="text/javascript"src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    </head>


    <body>
        <header>
            <div class="izq">
                <h3 class="titulo">Bee Lab - Estadísticas</h3>
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
                 <button type="button" class="collapsible">Información</button>
                <div class="content1">
                  <p>En esta pagina se lograra evidenciar todos los registros de actividades relacionadas con cada una de las variables que se ingresen en el formulario.</p>
                </div>
                <br><br>
                <fieldset class="datos-basicos" >
                    <legend>Datos basicos</legend>
                    
                    <form id="formulario" method="POST" action="{{url('Statistics')}}" > 
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <label name="temperatura">Temperatura (°C) </label>
                        <br>    
                        <input type="number" name="temperatura" id="temperatura" placeholder="Ejemplo: 30" title="Solo ingresar numeros enteros." required>
                        <br> <br>
                        <label name="humedad">Humedad (%)</label>
                        <br>    
                        <input type="number" name="humedad" id="humedad" placeholder="Ejemplo: 30" title="Solo ingresar numeros enteros." required>
                        <br> <br>
                        <label name="temperatura-apiario">Temperatura del apiario (°C) </label>
                        <br>    
                        <input type="number" name="temperatura_apiario" id="apiario" placeholder="Ejemplo: 30" title="Solo ingresar numeros enteros." required>
                        <br> <br>
                        <button type="submit" name="submit" class="boton-consulta">Ver</button>
                        <br><br>
                    </form>
                </fieldset>
                <br>
                <label name="temperatura-apiario">{{$x}}</label>
                <br><br>

                

            </div>
           
            <script type="text/javascript">
                var coll = document.getElementsByClassName("collapsible");
                    var i;

                    for (i = 0; i < coll.length; i++) {
                      coll[i].addEventListener("click", function() {
                        this.classList.toggle("active");
                        var content1 = this.nextElementSibling;
                        if (content1.style.display === "block") {
                          content1.style.display = "none";
                        } else {
                          content1.style.display = "block";
                        }
                      });
                    }
            </script>

            <div id="container" class="container" name="container" ><div>
                    
            <div class="grafica" id="grafica">
                <script type="text/javascript">
                


                Highcharts.chart('grafica', {
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
                                        <?php foreach ($con2 as $c2): ?>
                                        [<?php echo $c2 ?>],
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