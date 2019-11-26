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
        $x;
        $fecha_actual = date("Y-m-d");
      
        if ($fecha_actual>$fecha) {
            $x = "La fecha ingresada es posterior a la actual.";
            return view('reports',compact('x'));
        }else{
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
                $x = "No se encontro apiarios con datos relacionados.";
                return view('/reports',compact('x'));
            }else{
                $pdf = \PDF::loadView('/generadorPDF',compact('apiario'));
                return $pdf->download('reporte.pdf');
            }
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
        $x1;
        $fecha_actual = date("Y-m-d");
      
        if ($fecha_actual>$fecha) {
            $x1 = "La fecha ingresada es posterior a la actual.";
            return view('reports',compact('x1'));
        }else{
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
            ->where('clima_apiario.hora','>','00:00:00')
            ->where('clima_apiario.hora','<','06:00:00')
            ->get();
            
            if (empty($apiario) || (count($apiario) < 1)) {
                $x1 = "No se encontro apiarios con datos relacionados.";
                return view('reports',compact('x1'));
            }else{
                $pdf = \PDF::loadView('/generadorPDF',compact('apiario'));
                return $pdf->download('reporte-franja1.pdf');
            }
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
        $x2;

        $fecha_actual = date("Y-m-d");
      
        if ($fecha_actual>$fecha) {
            $x2 = "La fecha ingresada es posterior a la actual.";
            return view('reports',compact('x2'));
        }else{
            $apiario = \DB::table('apiario')
            ->join('users','apiario.user_id','=','users.id')
            ->join('ubicacion','apiario.ubicacion_id','=','ubicacion.id')
            ->join('clima_ambiente','clima_ambiente.apiario_id','=','apiario.id')
            ->join('clima_apiario','clima_apiario.apiario_id','=','apiario.id') 
            ->join('actividad','actividad.apiario_id','=','apiario.id')
            ->select("apiario.nombre",'actividad.entrada',
                'actividad.salida',"ubicacion.url","users.name",
                "clima_ambiente.temperatura as temperaturaAmb",
                "clima_ambiente.humedad",
                "clima_apiario.temperatura as temperaturaApi")
            ->where('clima_apiario.fecha','=',$fecha)
            ->where('clima_apiario.hora','>','05:59:59')
            ->where('clima_apiario.hora','<','12:00:00')
            ->get();
            
            if (empty($apiario) || (count($apiario) < 1)) {
                $x2 = "No se encontro apiarios con datos relacionados.";
                return view('reports',compact('x2'));
            }else{
                $pdf = \PDF::loadView('/generadorPDF',compact('apiario'));
                return $pdf->download('reporte-franja2.pdf');
            }
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
        $x3;
        $fecha_actual = date("Y-m-d");
      
        if ($fecha_actual>$fecha) {
            $x3 = "La fecha ingresada es posterior a la actual.";
            return view('reports',compact('x3'));
        }else{
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
            ->where('clima_apiario.hora','>','11:59:59')
            ->where('clima_apiario.hora','<','18:00:00')
            ->get();
            
            if (empty($apiario) || (count($apiario) < 1)) {
                $x3 = "No se encontro apiarios con datos relacionados.";
                return view('reports',compact('x3'));
            }else{
                $pdf = \PDF::loadView('/generadorPDF',compact('apiario'));
                return $pdf->download('reporte-franja3.pdf');
            }
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
        $x4;
        $fecha_actual = date("Y-m-d");
      
        if ($fecha_actual>$fecha) {
            $x4 = "La fecha ingresada es posterior a la actual.";
            return view('reports',compact('x4'));
        }else{
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
            ->where('clima_apiario.hora','>','17:59:59')
            ->get();
            
            if (empty($apiario) || (count($apiario) < 1)) {
                $x4 = "No se encontro apiarios con datos relacionados.";
                return view('reports',compact('x4'));
            }else{
                $pdf = \PDF::loadView('/generadorPDF',compact('apiario'));
                return $pdf->download('reporte-franja4.pdf');
            }
        }
    }
}
