<?php

namespace Tests\Unit;

use App\User;
use Illuminate\Support\Facades\File;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
   //use RefreshDatabase;

    /** @test */
    public function register()
    {
        $data = [
            'email' => 'dave@mail.ru',
            'password' => '123'
        ];

        User::addUser($data);

        $this->assertDatabaseHas('users', [
            'email' => 'dave@mail.ru'
        ]);
    }

    /** @test */
    public function select()
    {
        User::find(3);

        $this->assertDatabaseHas('users', [
            'id' => 3
        ]);

    }


}
