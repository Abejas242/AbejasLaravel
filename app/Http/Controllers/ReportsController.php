<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportsController extends Controller
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
        return view('reports');
    }

    function imprimirCompleto(Request $request){

        $fecha = $request-> input("fecha_ingresada");
        $apiario = \DB::table('apiario')
                    ->select("apiario.nombre",'actividad.entrada',
                        'actividad.salida',"ubicacion.url","users.name",
                        "clima_ambiente.temperatura as temperaturaAmb",
                        "clima_ambiente.humedad",
                        "clima_apiario.temperatura as temperaturaApi")
                    ->join('users','apiario.user_id','=','users.id')
                    ->join('ubicacion','apiario.ubicacion_id','=','ubicacion.id')
                    ->join('clima_ambiente','clima_ambiente.apiario_id','=','apiario.id')
                    ->join('clima_apiario','clima_apiario.apiario_id','=','apiario.id')
                    ->join('actividad','actividad.apiario_id','=','apiario.id')
                    ->where('clima_apiario.fecha','=',$fecha)
                    ->get();

        if (empty($apiario) || (count($apiario) <= 1)) {
            return view('/reports',compact('apiario'));
        }else{
            $pdf = \PDF::loadView('/generadorPDF',compact('apiario'));
            return $pdf->download('reporte-$fecha.pdf');
        }
        
    }

    /**
     * Impresion de reporte para la franja 1 
     *
     * @param Request $request
     * @return void
     */
    function imprimirFranja1(Request $request){

        $fecha = $request-> input("fecha_ingresada");

        $apiario = \DB::table('apiario')
        ->select("apiario.nombre",'actividad.entrada',
            'actividad.salida',"ubicacion.url","users.name",
            "clima_ambiente.temperatura as temperaturaAmb",
            "clima_ambiente.humedad",
            "clima_apiario.temperatura as temperaturaApi")
        ->join('users','apiario.user_id','=','users.id')
        ->join('ubicacion','apiario.ubicacion_id','=','ubicacion.id')
        ->join('clima_ambiente','clima_ambiente.apiario_id','=','apiario.id')
        ->join('clima_apiario','clima_apiario.apiario_id','=','apiario.id')
        ->join('actividad','actividad.apiario_id','=','apiario.id')
            ->where('clima_apiario.fecha','=',$fecha,'and',
            'clima_apiario.hora','>=','00:00:00','and','clima_apiario.hora','<','06:00:00')
        ->get();
        
        if (empty($apiario)) {
            return view('reports',compact('apiario'));
        }else{
            $pdf = \PDF::loadView('/generadorPDF',compact('apiario'));
            return $pdf->download('reporte-$fecha-franja1.pdf');
        }
    }

     /**
     * Impresion de reporte para la franja 2
     *
     * @param Request $request
     * @return void
     */
    function imprimirFranja2(Request $request){

        $fecha = $request-> input("fecha_ingresada");

        $apiario = \DB::table('apiario')
        ->select("apiario.nombre",'actividad.entrada',
            'actividad.salida',"ubicacion.url","users.name",
            "clima_ambiente.temperatura as temperaturaAmb",
            "clima_ambiente.humedad",
            "clima_apiario.temperatura as temperaturaApi")
        ->join('users','apiario.user_id','=','users.id')
        ->join('ubicacion','apiario.ubicacion_id','=','ubicacion.id')
        ->join('clima_ambiente','clima_ambiente.apiario_id','=','apiario.id')
        ->join('clima_apiario','clima_apiario.apiario_id','=','apiario.id')
        ->join('actividad','actividad.apiario_id','=','apiario.id')
        ->where('clima_apiario.fecha','=',$fecha,'and',
            'clima_apiario.hora','>=','06:00:00','and','clima_apiario.hora','<','12:00:00')
        ->get();
        
        if (empty($apiario)) {
            return view('reports',compact('apiario'));
        }else{
            $pdf = \PDF::loadView('/generadorPDF',compact('apiario'));
            return $pdf->download('reporte-$fecha-franja2.pdf');
        }
    }

     /**
     * Impresion de reporte para la franja 3
     *
     * @param Request $request
     * @return void
     */
    function imprimirFranja3(Request $request){

        $fecha = $request-> input("fecha_ingresada");

        $apiario = \DB::table('apiario')
        ->select("apiario.nombre",'actividad.entrada',
            'actividad.salida',"ubicacion.url","users.name",
            "clima_ambiente.temperatura as temperaturaAmb",
            "clima_ambiente.humedad",
            "clima_apiario.temperatura as temperaturaApi")
        ->join('users','apiario.user_id','=','users.id')
        ->join('ubicacion','apiario.ubicacion_id','=','ubicacion.id')
        ->join('clima_ambiente','clima_ambiente.apiario_id','=','apiario.id')
        ->join('clima_apiario','clima_apiario.apiario_id','=','apiario.id')
        ->join('actividad','actividad.apiario_id','=','apiario.id')
        ->where('clima_apiario.fecha','=',$fecha,'and',
            'clima_apiario.hora','>=','12:00:00','and','clima_apiario.hora','<','18:00:00')
        ->get();
        
        if (empty($apiario)) {
            return view('reports',compact('apiario'));
        }else{
            $pdf = \PDF::loadView('/generadorPDF',compact('apiario'));
            return $pdf->download('reporte-$fecha-franja3.pdf');
        }
    }

     /**
     * Impresion de reporte para la franja 4
     *
     * @param Request $request
     * @return void
     */
    function imprimirFranja4(Request $request){

        $fecha = $request-> input("fecha_ingresada");

        $apiario = \DB::table('apiario')
        ->select("apiario.nombre",'actividad.entrada',
            'actividad.salida',"ubicacion.url","users.name",
            "clima_ambiente.temperatura as temperaturaAmb",
            "clima_ambiente.humedad",
            "clima_apiario.temperatura as temperaturaApi")
        ->join('users','apiarSio.user_id','=','users.id')
        ->join('ubicacion','apiario.ubicacion_id','=','ubicacion.id')
        ->join('clima_ambiente','clima_ambiente.apiario_id','=','apiario.id')
        ->join('clima_apiario','clima_apiario.apiario_id','=','apiario.id')
        ->join('actividad','actividad.apiario_id','=','apiario.id')
        ->where('clima_apiario.fecha','=',$fecha,'and',
            'clima_apiario.hora','>=','18:00:00','and','clima_apiario.hora=11:59:59')
        ->get();
        
        if (empty($apiario)) {
            return view('reports',compact('apiario'));
        }else{
            $pdf = \PDF::loadView('/generadorPDF',compact('apiario'));
            return $pdf->download('reporte-$fecha-franja4.pdf');
        }
    }
}
