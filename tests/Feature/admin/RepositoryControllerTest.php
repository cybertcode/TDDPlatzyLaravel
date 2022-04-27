<?php

namespace Tests\Feature\admin;

use App\Models\admin\Repository;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RepositoryControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use WithFaker, RefreshDatabase;
    /********************************************
     * Método para verificar si están logueados *
     ********************************************/
    public function test_guest()
    {
        // Redireccionamos a login
        $this->get('repositories')->assertRedirect('login'); //index
        $this->get('repositories/1')->assertRedirect('login'); //show
        $this->get('repositories/1/edit')->assertRedirect('login'); //edit
        $this->put('repositories/1')->assertRedirect('login'); //update
        $this->delete('repositories/1')->assertRedirect('login'); //destroy
        $this->get('repositories/create')->assertRedirect('login'); //create
        $this->post('repositories', [])->assertRedirect('login'); //store - save
    }
    /******************************
     * Metodo para nuevo registro *
     ******************************/
    public function test_store()
    {
        // Como si fuera nuestro formulario - que deseamos guardar
        $data = [
            'url' => $this->faker->url,
            'description' => $this->faker->text,
        ];
        // Usuario que va utilizar ésta información - creamos un usurio - iniciamos sessión - guardar -  redireccionar
        $user = User::factory()->create();
        $this->actingAs($user) // Conectamos con ese Usuario
            ->post('repositories', $data) // direccion del store
            ->assertRedirect('repositories'); // redireccionamos
        // Veficamos la información en la BD
        $this->assertDatabaseHas('repositories', $data); // el nombre de la BD - data registrada
    }
    public function test_update()
    {
        // Creamos un registro
        $repository = Repository::factory()->create();
        // Como si fuera nuestro formulario - que deseamos actualizar
        $data = [
            'url' => $this->faker->url,
            'description' => $this->faker->text,
        ];
        // Usuario que va utilizar ésta información - creamos un usurio - iniciamos sessión - guardar -  redireccionar
        $user = User::factory()->create();
        $this->actingAs($user) // Conectamos con ese Usuario
            ->put("repositories/$repository->id", $data) // direccion del update
            ->assertRedirect("repositories/$repository->id/edit"); // redireccionamos
        // Veficamos la información en la BD
        $this->assertDatabaseHas('repositories', $data); // el nombre de la BD - data registrada
    }
}