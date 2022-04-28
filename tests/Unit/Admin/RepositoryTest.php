<?php

namespace Tests\Unit\admin;

use App\Models\admin\Repository;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
// use PHPUnit\Framework\TestCase;
use Tests\TestCase;
//importamos

class RepositoryTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    /*********************************
     * Método pertenece a un Usuario *
     *********************************/
    use RefreshDatabase;
    public function test_belongs_to_user()
    {
        // creamos un registro falso
        $repository = Repository::factory()->create();
        // Verifcamos si contiene datos
        $this->assertInstanceOf(User::class, $repository->user);

    }
}
