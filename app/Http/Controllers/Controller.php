<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function imprimir(Request $request){

        $fecha = $request-> input("fecha_ingresada");
        $apiario = \DB::table('apiario')
                    ->join('users','apiario.user_id','=','users.id')
                    ->join('ubicacion','apiario.ubicacion_id','=','ubicacion.id')
                    ->join('clima_apiario','clima_apiario.apiario_id','=','apiario.id')
                    ->select('apiario.nombre','users.name','ubicacion.url')
                    ->where('clima_apiario.fecha','=',$fecha)
                    ->get();

        if (isset($apiario)) {
            $pdf = \PDF::loadView('/generadorPDF',compact('apiario'));
            return $pdf->download('ejemplo.pdf');
        }else{
            return view('reports',compact('apiario'));
        }
        
    }

    function consultar(Request $request){
        $temperatura = $request->input("temperatura");

        $actividades = DB::table('actividad')
                        ->join('clima_ambiente','actividad.apiario_id','=','clima_ambiente.apiario_id')
                        ->where('clima_ambiente.temperatura',$temperatura)
                        ->get();

         return view('statistics',compact('actividades'));
    }

    function estimar(Request $request)
    {
        $temperatura = $request->input("temperatura");
        $humedad = $request->input("humedad");
        $actividadTotal = "0";

        $estimacion = \DB::table('apiario')
                        ->select('actividad.entrada','actividad.salida','apiario.id')
                        ->join('clima_ambiente','clima_ambiente.apiario_id','=','apiario.id')
                        ->join('actividad','actividad.apiario_id','=','apiario.id')
                        ->where('clima_ambiente.temperatura','=',$temperatura, 
                            'or', 'clima_ambiente."Porcentaje_Humedad"','=',$humedad)
                        ->get();

        
        foreach ($estimacion as $datos) {
            $actividadParcial = (($datos->entrada) + ($datos->salida));
            $actividadTotal = $actividadTotal + $actividadParcial;
        }  

        if (isset($estimacion)) {
            $actividadTotal = $actividadTotal/count($estimacion);
        }else{
            $actividadTotal = "0";
        }
        return view('estimates',compact('actividadTotal'));
    }
     
}
