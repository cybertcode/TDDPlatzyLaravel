<?php

namespace Tests\Feature\admin;

use App\Models\admin\Repository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PageControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;
    use WithFaker;
    /*****************************************
     * Para verificar la páginas del sistema *
     *****************************************/
    public function test_home()
    {
        $repository = Repository::factory()->create();
        $this->get('/') // ruta principal
            ->assertStatus(200)
            ->assertSee($repository->url); //Vericamos en vista si existe
    }
}