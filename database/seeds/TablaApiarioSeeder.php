<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class TablaApiarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //DB::statement('TRUNCATE TABLE {apiario} RESTART IDENTITY CASCADE');
        $nombre = [
       		'Apiario Castañeda',
       		'Apiario Tiagori',
       		'Apiario Adrian Barrera'
       ];
       $url = [
       		'1',
       		'2',
       		'3'
       ];
       
       		DB::table('apiario')-> insert([
       			'nombre' => 'Apiario Abdon',
       			'ubicacion_id' => '1',
       			'user_id'=>'1',
       			'created_at'=>Carbon::now()->format('Y-m-d H:i:s')
       		]);
       		DB::table('apiario')-> insert([
       			'nombre' => 'Apiario Tiagori',
       			'ubicacion_id' => '2',
       			'user_id'=>'1',
       			'created_at'=>Carbon::now()->format('Y-m-d H:i:s')
       		]);
       		DB::table('apiario')-> insert([
       			'nombre' => 'Apiario Adrian Barrera',
       			'ubicacion_id' => '3',
       			'user_id'=>'1',
       			'created_at'=>Carbon::now()->format('Y-m-d H:i:s')
       		]);
    }
}
