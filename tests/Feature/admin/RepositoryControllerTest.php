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
    /***********************
     * Actualizar registro *
     ***********************/
    public function test_update()
    {
        // Usuario que va utilizar ésta información - creamos un usurio - iniciamos sessión - guardar -  redireccionar
        $user = User::factory()->create();
        // Creamos un registro
        $repository = Repository::factory()->create(['user_id' => $user->id]); //Pasamos el usuario previamente creado
        // Como si fuera nuestro formulario - que deseamos actualizar
        $data = [
            'url' => $this->faker->url,
            'description' => $this->faker->text,
        ];

        $this->actingAs($user) // Conectamos con ese Usuario
            ->put("repositories/$repository->id", $data) // direccion del update
            ->assertRedirect("repositories/$repository->id/edit"); // redireccionamos
        // Veficamos la información en la BD
        $this->assertDatabaseHas('repositories', $data); // el nombre de la BD - data registrada
    }
    /*********************************************
     * Políticas de acceso - Proteger_actualizar *
     *********************************************/
    public function test_update_policy()
    {
        // Usuario que va utilizar ésta información - creamos un usurio - iniciamos sessión - guardar -  redireccionar
        $user = User::factory()->create();

        // Creamos un registro
        $repository = Repository::factory()->create();
        // Como si fuera nuestro formulario - que deseamos actualizar
        $data = [
            'url' => $this->faker->url,
            'description' => $this->faker->text,
        ];

        $this->actingAs($user) // Conectamos con ese Usuario
            ->put("repositories/$repository->id", $data) // direccion del update
            ->assertStatus(403); // Redireccionamos con eso error - Usuario no puede actualizar el registro que no le corresponde o no le pertenece
    }
    /**************
     * Validación *
     **************/
    public function test_validate_store()
    {
        // Usuario que va utilizar ésta información - creamos un usurio - iniciamos sessión - guardar -  redireccionar
        $user = User::factory()->create();
        $this->actingAs($user) // Conectamos con ese Usuario
            ->post('repositories', []) // direccion del store - no enviar data(vacio)
            ->assertStatus(302) // redireccionamo a nivel estado - 302 mensaje de error de redirección al mismo página y que se puede imprmir en la vista
            ->assertSessionHasErrors(['url', 'description']); // quiero ver el mensaje de error recto a los campos
    }
    public function test_validate_update()
    {
        // Creamos un registro
        $repository = Repository::factory()->create();
        // Usuario que va utilizar ésta información - creamos un usurio - iniciamos sessión - actualizar -  redireccionar
        $user = User::factory()->create();
        $this->actingAs($user) // Conectamos con ese Usuario
            ->put("repositories/$repository->id", []) // direccion del update - no mandamos nada
            ->assertStatus(302) // redireccionamo a nivel estado - 302 mensaje de error de redirección al mismo página y que se puede imprmir en la vista
            ->assertSessionHasErrors(['url', 'description']); // quiero ver el mensaje de error recto a los campos

    }
    /*********************
     * Eliminar registro *
     *********************/
    public function test_destroy()
    {
        // Usuario que va utilizar ésta información - creamos un usurio - iniciamos sessión - guardar
        $user = User::factory()->create();
        // Creamos un registro
        $repository = Repository::factory()->create(['user_id' => $user->id]); //Pasamos el Usuario que creamos previamente
        $this->actingAs($user) // Conectamos con ese Usuario
            ->delete("repositories/$repository->id") // Dirección del eliminación
            ->assertRedirect("repositories"); // Redireccionamos al index
        // Veficamos que en la BD ya no existe ese registro
        $this->assertDatabaseMissing('repositories', [
            'id' => $repository->id,
            'url' => $repository->url,
            'description' => $repository->description,
        ]); // verificamos la información de los campos
    }
    /****************************
     * Eliminar registro policy *
     ****************************/
    public function test_destroy_policy()
    {
        // Usuario que va utilizar ésta información - creamos un usurio - iniciamos sessión - eliminar -  redireccionar
        $user = User::factory()->create();
        // Creamos un registro
        $repository = Repository::factory()->create();
        $this->actingAs($user) // Conectamos con ese Usuario
            ->delete("repositories/$repository->id") // Dirección del eliminación
            ->assertStatus(403); // Redireccionamos al index
    }
    /********************************
 * Fin eliminar registro policy *
 ********************************/
}