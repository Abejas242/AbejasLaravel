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

        $con = \DB::table('clima_ambiente')
                ->join('actividad','clima_ambiente.apiario_id','=','actividad.apiario_id')
                ->select('actividad.entrada')
                ->DISTINCT()
                ->where('clima_ambiente.fecha','=',$variable)
                ->where('clima_ambiente.hora','>','00:00:00')
                ->where('clima_ambiente.hora','<','06:00:00')
                ->max('actividad.entrada');

        $con1 = \DB::table('clima_ambiente')
                ->join('actividad','clima_ambiente.apiario_id','=','actividad.apiario_id')
                ->select('actividad.entrada')
                ->DISTINCT()
                ->where('clima_ambiente.fecha','=',$variable)
                ->where('clima_ambiente.hora','>','06:00:00')
                ->where('clima_ambiente.hora','<','12:00:00')
                ->max('actividad.entrada');

        $con2 = \DB::table('clima_ambiente')
                ->join('actividad','clima_ambiente.apiario_id','=','actividad.apiario_id')
                ->select('actividad.entrada')
                ->DISTINCT()
                ->where('clima_ambiente.fecha','=',$variable)
                ->where('clima_ambiente.hora','>','12:00:00')
                ->where('clima_ambiente.hora','<','18:00:00')
                ->max('actividad.entrada');

        $con3 = \DB::table('clima_ambiente')
                ->join('actividad','clima_ambiente.apiario_id','=','actividad.apiario_id')
                ->select('actividad.entrada')
                ->DISTINCT()
                ->where('clima_ambiente.fecha','=',$variable)
                ->where('clima_ambiente.hora','>','18:00:00')
                ->where('clima_ambiente.hora','<','23:59:59')
                ->max('actividad.entrada');


      return view('analysis',compact('con','con1','con2','con3'));
    } 
}
