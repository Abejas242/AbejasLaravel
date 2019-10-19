<!DOCTYPE html>
<html lang="es">

<?php 
    
    foreach ($apiario as $datos) {
        $nombre =  $datos->nombre;
        $usuario = $datos->name;
        $ubicacion = $datos->url;
    }
    
    $hora = '10am';
    $var1= '5';
    $var2= '10';
?>
    <head>
        <meta charset="UTF-8">
        <title>Documento de abejas</title>
        <link rel="stylesheet" href="css/gen.css" type="text/css">
        <script src="js/jquery.js" type="text/javascript"></script>
        <script src="js/reports.js" type="text/javascript"></script>
    </head>
    <body>
        <header>
            <h1>Reporte de medición</h1>
            <h3>Seccion para la descripcion del documento.</h3>
            <h4>Hora: <?php echo $hora ?></h4>
        </header>

        <main>
            <form action="">
                <fieldset class="apiario">
                    <legend>Datos apiario</legend>
                    <h4>Acontinuación se presentan los datos afines al apiario como por 
                        ejemplo la ubicación del apiario, la temperatura, entre otros. </h4>

                    <fieldset class="apiario-basicos">
                    <legend>Datos basicos</legend>
                    <table class="tabla-api-bas">
                            <tr>
                                <td><label for="">Nombre del apiario:</label></td>
                                <td><label class="datos"><?php echo $nombre ?></label></td>
                            </tr>
                            <tr>
                                <td><label for="">Dueño:</label></td>
                                <td><label class="datos"><?php echo $usuario ?></label></td>
                            </tr>
                            <tr>
                                <td><label for="">Ubicacion:</label></td>
                                <td><label class="datos"><?php echo $ubicacion ?></label></td>
                            </tr>
                    </table>
                    </fieldset>

                    <fieldset  class="apiario-ambiente">
                        <legend>Datos obtenidos</legend>
                        <h4>En esta sección se presentan los datos recopilados mediante el uso de sensores 
                            ubicados dentro del apiario.</h4>
                        <table class="tabla-amb">
                            <thead>
                                <tr>
                                    <th>Temperatura</th><th>Actividad</th>
                                </tr>
                            </thead>
                            <tr>
                                <td><?php echo $var2 ?></td>
                                <td><?php echo $var2 ?></td>    
                            </tr>
                            <tr>
                                <td><?php echo $var2 ?></td>
                                <td><?php echo $var2 ?></td>
                            </tr>
                    </table>
                    </fieldset>

                </fieldset>
                <div class="ambiente-datos">
                    <fieldset>
                        <legend>Datos climaticos</legend>
                        <h4>A continuacion se presentan los datos recopilados por la estacion meteorologica cercana al apiario.</h4>
                        <table class="tabla-amb">
                            <thead>
                                <tr>
                                    <th>Temperatura</th><th>Humedad</th><th>Presion</th>
                                </tr>
                            </thead>

                            <tr>
                                <td><?php echo $var1 ?></td>
                                <td><?php echo $var1 ?></td>
                                <td><?php echo $var1 ?></td>
                            </tr>
                            <tr>
                                <td><?php echo $var1 ?></td>
                                <td><?php echo $var1 ?></td>
                                <td><?php echo $var1 ?></td>
                            </tr>
                            <tr>
                                <td><?php echo $var1 ?></td>
                                <td><?php echo $var1 ?></td>
                                <td><?php echo $var1 ?></td>
                            </tr>
                            <tr>
                                <td><?php echo $var1 ?></td>
                                <td><?php echo $var1 ?></td
                                ><td><?php echo $var1 ?></td>
                            </tr>
                        </table>
                    </fieldset>
                </div>
            </form>
            
        </main>

        <footer>

        </footer>

        
        
    </body>
</html>