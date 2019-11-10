<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AnalysisController extends Controller
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
        
        return view('analysis');
    }

    public function store(){

$variable = $_POST['fecha_ingresada'];    

        $consulta1 = \DB::table('clima_ambiente')
                ->join('actividad','clima_ambiente.apiario_id','=','actividad.apiario_id')
                ->select('actividad.entrada','clima_ambiente.temperatura','clima_ambiente.humedad')
                ->DISTINCT()
                ->where('clima_ambiente.fecha','=',$variable)
                ->where('clima_ambiente.hora','>','00:00:00')
                ->where('clima_ambiente.hora','<','06:00:00')
                ->orderBy('actividad.entrada','desc')
                ->take(1)
                ->get();

        $consulta2 = \DB::table('clima_ambiente')
                ->join('actividad','clima_ambiente.apiario_id','=','actividad.apiario_id')
                ->select('actividad.entrada','clima_ambiente.temperatura','clima_ambiente.humedad')
                ->DISTINCT()
                ->where('clima_ambiente.fecha','=',$variable)
                ->where('clima_ambiente.hora','>','06:00:00')
                ->where('clima_ambiente.hora','<','12:00:00')
                ->orderBy('actividad.entrada','desc')
                ->take(1)
                ->get();

        $consulta3 = \DB::table('clima_ambiente')
                ->join('actividad','clima_ambiente.apiario_id','=','actividad.apiario_id')
                ->select('actividad.entrada','clima_ambiente.temperatura','clima_ambiente.humedad')
                ->DISTINCT()
                ->where('clima_ambiente.fecha','=',$variable)
                ->where('clima_ambiente.hora','>','12:00:00')
                ->where('clima_ambiente.hora','<','18:00:00')
                ->orderBy('actividad.entrada','desc')
                ->take(1)
                ->get();

        $consulta4 = \DB::table('clima_ambiente')
                ->join('actividad','clima_ambiente.apiario_id','=','actividad.apiario_id')
                ->select('actividad.entrada','clima_ambiente.temperatura','clima_ambiente.humedad')
                ->DISTINCT()
                ->where('clima_ambiente.fecha','=',$variable)
                ->where('clima_ambiente.hora','>','18:00:00')
                ->where('clima_ambiente.hora','<','23:59:59')
                ->orderBy('actividad.entrada','desc')
                ->take(1)
                ->get();

         $con5 = \DB::table('clima_apiario')
                ->join('actividad','clima_apiario.apiario_id','=','actividad.apiario_id')
                ->select('clima_apiario.temperatura')
                ->DISTINCT()
                ->where('clima_apiario.fecha','=',$variable)
                ->where('clima_apiario.hora','>','00:00:00')
                ->where('clima_apiario.hora','<','06:00:00')
                ->max('clima_apiario.temperatura');

        $con6 = \DB::table('clima_apiario')
                ->join('actividad','clima_apiario.apiario_id','=','actividad.apiario_id')
                ->select('clima_apiario.temperatura')
                ->DISTINCT()
                ->where('clima_apiario.fecha','=',$variable)
                ->where('clima_apiario.hora','>','06:00:00')
                ->where('clima_apiario.hora','<','12:00:00')
                ->max('clima_apiario.temperatura');

        $con7 = \DB::table('clima_apiario')
                ->join('actividad','clima_apiario.apiario_id','=','actividad.apiario_id')
                ->select('actividad.entrada')
                ->DISTINCT()
                ->where('clima_apiario.fecha','=',$variable)
                ->where('clima_apiario.hora','>','12:00:00')
                ->where('clima_apiario.hora','<','18:00:00')
                ->max('clima_apiario.temperatura');

        $con8 = \DB::table('clima_apiario')
                ->join('actividad','clima_apiario.apiario_id','=','actividad.apiario_id')
                ->select('clima_apiario.temperatura')
                ->DISTINCT()
                ->where('clima_apiario.fecha','=',$variable)
                ->where('clima_apiario.hora','>','18:00:00')
                ->where('clima_apiario.hora','<','23:59:59')
                ->max('clima_apiario.temperatura');

        $con1="";
        $con11="";
        $con111="";      
        foreach ($consulta1 as $c1) {
            $con1=  $c1->entrada;
            $con11=  $c1->temperatura;
            $con111=  $c1->humedad;
        }
        $con2="";
        $con22="";
        $con222="";
        foreach ($consulta2 as $c2) {
            $con2=  $c2->entrada;
            $con22=  $c2->temperatura;
            $con222=  $c2->humedad;
        }
        $con3="";
        $con33="";
        $con333="";      
        foreach ($consulta3 as $c3) {
            $con3=  $c3->entrada;
            $con33=  $c3->temperatura;
            $con333=  $c3->humedad;
        }
        $con4="";
        $con44="";
        $con444="";
        foreach ($consulta4 as $c4) {
            $con4=  $c4->entrada;
            $con44=  $c4->temperatura;
            $con444=  $c4->humedad;
        }       
        
      return view('analysis',compact('con1','con11','con111','con2','con22','con222','con3','con33','con333','con4','con44','con444','con5','con6','con7','con8'));
    } 
}
