<?php

namespace Tests\Unit\Admin;

// use Tests\TestCase;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    /************************
     * Para refrescar la BD *
     ************************/
    use RefreshDatabase;

    /*********************************
     * Método para relación Multiple *
     *********************************/
    public function test_has_many_repositories()
    {
        $user = new User;
        $this->assertInstanceOf(Collection::class, $user->repositories);
    }
}