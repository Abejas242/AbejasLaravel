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
                ->join('actividad','clima_ambiente.fecha','=','actividad.fecha')
                ->select('actividad.fecha')
                ->where('clima_ambiente.fecha','=',$variable)
                ->max('actividad.entrada');

        $con1 = \DB::table('clima_ambiente')
                ->join('actividad','clima_ambiente.fecha','=','actividad.fecha')
                ->select('actividad.fecha')
                ->where('clima_ambiente.fecha','=',$variable)
                ->max('actividad.entrada');

        $con2 = \DB::table('clima_ambiente')
                ->join('actividad','clima_ambiente.fecha','=','actividad.fecha')
                ->select('actividad.fecha')
                ->where('clima_ambiente.fecha','=',$variable)
                ->max('actividad.entrada');

        $con3 = \DB::table('clima_ambiente')
                ->join('actividad','clima_ambiente.fecha','=','actividad.fecha')
                ->select('actividad.fecha')
                ->where('clima_ambiente.fecha','=',$variable)
                ->max('actividad.entrada');




                
        return view('analysis',compact('con','con1','con2','con3'));  
    }
}
