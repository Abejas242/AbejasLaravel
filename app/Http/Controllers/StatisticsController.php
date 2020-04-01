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
                ->select('actividad.entrada')
                ->join('actividad','actividad.apiario_id','=','clima_ambiente.apiario_id')
                ->where('clima_ambiente.temperatura','=',$variable)
                ->get();

        $consulta2=\DB::table('clima_ambiente')
                ->select('actividad.entrada')
                ->join('actividad','actividad.apiario_id','=','clima_ambiente.apiario_id')
                ->where('clima_ambiente.Porcentaje_humedad','=',$variable1)
                ->get();

        $consulta3=\DB::table('clima_apiario')
                ->select('actividad.entrada')
                ->join('actividad','actividad.apiario_id','=','clima_apiario.apiario_id')
                ->where('clima_apiario.temperatura','=',$variable2)
                ->get();

        $con1=[];
        $i1=0;
        foreach ($consulta1 as $c1) {
            $con1[$i1]=  $c1->entrada;
            $i1++;
           
        }
        $con2=[];
        $i2=0;
        foreach ($consulta2 as $c2) {
            $con2[$i2]=  $c2->entrada;
            $i2++;
           
        }
        $con3=[];
        $i3=0;
        foreach ($consulta3 as $c3) {
            $con3[$i3]=  $c3->entrada;
            $i3++;
           
        }           

    $x="";
    

    if (empty($con1)&&empty($con2)&&empty($con3)) {

       $x="No existen registros de actividad relacionados con la datos ingresados";

    }else if (empty($con1)&&empty($con2)) {
            $x="No existen registros de 
                actividad relacionados con la temperatura y humedad que ingresó";
    }else if (empty($con1)&&empty($con3)) {
            $x="No existen registros de 
                actividad relacionados con la temperatura y temperatura del apiario 
                que ingresó";
    }else if (empty($con2)&&empty($con3)) {
            $x="No existen registros de 
                actividad relacionados con la temperatura del apiario y humedad que ingresó";
    }else if (empty($con1)) {
            $x="No existen registros de 
                actividad relacionados con la temperatura que ingresó";
    }else if (empty($con2)) {
            $x="No existen registros de 
                actividad relacionados con la humedad que ingresó";
    }else if (empty($con3)) {
            $x="No existen registros de 
                actividad relacionados con la temperatura del apiario que ingresó";
    }
    
    return view('statistics',compact('con1','con3','con2','x'));
    
    }
}

