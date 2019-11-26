<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EstimateController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('estimates');
    }

    /**
     * Calculo de la actividad dada una informacion climatica
     *
     * @param Request $request 
     * @return actividad
     */
    function estimar(Request $request)
    {
        $temperatura = $request->input("temperatura");
        $humedad = $request->input("humedad");
        $actividadTotal = "0";
        $x;

        if ($temperatura >= 0 && $humedad >= 0){
            if ($temperatura >= 0) {
                if ($humedad >=0) {
                    $estimacion = \DB::table('apiario')
                        ->select('actividad.entrada','actividad.salida','apiario.id')
                        ->join('clima_ambiente','clima_ambiente.apiario_id','=','apiario.id')
                        ->join('actividad','actividad.apiario_id','=','apiario.id')
                        ->where('clima_ambiente.temperatura','=',$temperatura, 
                            'or', 'clima_ambiente.humedad','=',$humedad)
                        ->get();

                
                    foreach ($estimacion as $datos) {
                        $actividadParcial = (($datos->entrada) + ($datos->salida));
                        $actividadTotal = $actividadTotal + $actividadParcial;
                    }  

                    if (count($estimacion) >= 1) {
                        $actividadTotal = $actividadTotal/count($estimacion);
                        $x = "La actividad de las abejas con el clima ingresado es aproximadamente = $actividadTotal ";
                    }else{
                        $actividadTotal = "0"; 
                        $x = "No se encontro apiarios con datos relacionados.";
                    }
                }else{
                    $x = "La humedad debe ser positiva.";
                }
            }else{
                $x = "La temperatura debe ser positiva";
            }
        }else{
            $x = "Alguno de los datos ingresados es negativo deben ser positivos.";
        }
        return view('estimates',compact('x'));
    }
}
