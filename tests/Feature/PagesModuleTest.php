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
   public function testHome()
   {
        $this->get('/home')->assertStatus(200)->assertSee('home');
   }

    /* Test para la vista reports*/
   public function testReports()
   {
        $this->get('/reports')->assertStatus(200)->assertSee('reports');
   }

   /* Test para la vista statistics*/
   public function testStatistics()
   {
        $this->get('/statistics')->assertStatus(200)->assertSee('statistics');
   }

    /* Test para la vista estimates*/
   public function testEstimates()
   {
        $this->get('/estimates')->assertStatus(200)->assertSee('estimates');
   }

   /* Test para la vista analysis*/
   public function testAnalysis()
   {
        $this->get('/analysis')->assertStatus(200)->assertSee('analysis');
   }

   /* Test para la vista help*/
   public function testHelp()
   {
        $this->get('/help')->assertStatus(200)->assertSee('help');
   }
}