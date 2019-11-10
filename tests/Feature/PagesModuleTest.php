<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PagesModuleTest extends TestCase
{
   /**
    * Test para probar la accesibilidad de cada una de las vistas .
    *
    * @return void
    */

   /* Test para la vista home*/
   public function testHomeTest()
   {
        $this->get('/home')->assertStatus(200)->assertSee('home');
   }

    /* Test para la vista reports*/
   public function testReportsTest()
   {
        $this->get('/reports')->assertStatus(200)->assertSee('reports');
   }

   /* Test para la vista statistics*/
   public function testStatisticsTest()
   {
        $this->get('/statistics')->assertStatus(200)->assertSee('statistics');
   }

    /* Test para la vista estimates*/
   public function testEstimatesTest()
   {
        $this->get('/estimates')->assertStatus(200)->assertSee('estimates');
   }

   /* Test para la vista analysis*/
   public function testAnalysisTest()
   {
        $this->get('/analysis')->assertStatus(200)->assertSee('analysis');
   }

   /* Test para la vista help*/
   public function testHelpTest()
   {
        $this->get('/help')->assertStatus(200)->assertSee('help');
   }
}