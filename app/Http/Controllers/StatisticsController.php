<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class StatisticsController extends Controller
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
        
        return view('statistics');
    }

    public function store(){

        $variable=$_POST['temperatura'];
        $variable1=$_POST['humedad'];
        $variable2=$_POST['temperatura_apiario'];

        $consulta=\DB::table('clima_ambiente')
                ->join('actividad','actividad.apiario_id','=','clima_ambiente.apiario_id')
                ->select('actividad.entrada')
                ->where('clima_ambiente.temperatura','=',$variable)
                ->get();

        /*$consulta1=\DB::table('clima_ambiente')
                ->join('actividad','actividad.apiario_id','=','clima_ambiente.apiario_id')
                ->select('actividad.entrada')
                ->where('clima_ambiente."Porcentaje_Humedad"','=',$variable1)
                ->get();*/

        $consulta2=\DB::table('clima_apiario')
                ->join('actividad','actividad.apiario_id','=','clima_apiario.apiario_id')
                ->select('actividad.entrada')
                ->where('clima_apiario.temperatura','=',$variable2)
                ->get();

        $con1=[];
        $i=0;
        foreach ($consulta as $c) {
            $con1[$i]=  $c->entrada;
           
        }       

    //return view('statistics',compact('consulta','consulta2'));
    return $con1;
    }
}

