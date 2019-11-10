<?php
namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RutaAppTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testRutaTest()
    {
    	$response = $this->call('GET','MiApp');
    	$this->assertResponseOk();
        $this->assertEquals('Esta es mi APP', $response->getContent());
    }
}
