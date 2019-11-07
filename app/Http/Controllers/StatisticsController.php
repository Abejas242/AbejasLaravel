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

        $consulta1=\DB::table('clima_ambiente')
                ->join('actividad','actividad.apiario_id','=','clima_ambiente.apiario_id')
                ->select('actividad.entrada')
                ->where('clima_ambiente.temperatura','=',$variable)
                ->get();

        /*$consulta1=\DB::table('clima_ambiente')
                ->join('actividad','actividad.apiario_id','=','clima_ambiente.apiario_id')
                ->select('actividad.entrada')
                ->where('clima_ambiente."Porcentaje_Humedad"','=',$variable1)
                ->get();*/

        $consulta3=\DB::table('clima_apiario')
                ->join('actividad','actividad.apiario_id','=','clima_apiario.apiario_id')
                ->select('actividad.entrada')
                ->where('clima_apiario.temperatura','=',$variable2)
                ->get();

        $con1=[];
        $i1=0;
        foreach ($consulta1 as $c1) {
            $con1[$i1]=  $c1->entrada;
            $i1++;
           
        }
        $con3=[];
        $i3=0;
        foreach ($consulta3 as $c3) {
            $con3[$i3]=  $c3->entrada;
            $i3++;
           
        }           

    return view('statistics2',compact('con1','con3'));
    
    }
}

