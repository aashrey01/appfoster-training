<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Project;
use Illuminate\Support\Facades\Hash;


class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/api/users');

        $response->assertStatus(200);
    }



    public function test_user_create()
    {

        $payload = [
            'name' => 'lon Doe',
            'email' => 'yorn@example.com',
            'password' => Hash::make('password321') 
        ];

        $user = User::create($payload);

        $this->assertSame($payload['name'], $user->name,'not created');

    }



    public function test_projects()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $project = Project::factory()->create(['user_id' => $user->id]);

        $response = $this->get('/api/users/' . $user->id . '/projects');

        $response->assertStatus(200);
    }


    public function test_update_user()
    {
        
        $user = User::factory()->create();

        $updatedData = [
            'name' => 'Halo SquarePants',
            'email' => 'hio@example.com', 
        ];

        $this->actingAs($user);

        $response = $this->put('/api/users/' . $user->id, $updatedData);

        $response->assertStatus(200);

        $this->assertSame($updatedData['name'], $user->name);
        $this->assertSame($updatedData['email'], $user->email);
    }
}
