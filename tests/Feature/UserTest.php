<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use WithFaker;
    public function test_create_user()
    {
        $name = $this->faker->name();
        $email = $this->faker->email();

        $user = User::factory()->create([
            'name' => $name,
            'email' => $email,

        ]);

        $this->assertInstanceOf(User::class, $user);
        $this->assertEquals($name, $user->name);
        $this->assertEquals($email, $user->email);
    }
    public function test_update_user()
    {
        $user = User::factory()->create([
            'name' => 'John',
            'email' => 'johndoe@example.com',
        ]);

        // Update the user's name and email
        $user->update([
            'name' => '3bod',
            'email' => 'janedoe@example.com',
            'phone' => $this->faker->phoneNumber(),

        ]);

        $updatedUser = User::find($user->id);

        // Ensure that the user object has been updated with the new values
        $this->assertEquals('3bod', $updatedUser->name);
        $this->assertEquals('janedoe@example.com', $updatedUser->email);
    }
    public function test_delete_user()
    {
        // Create a user using the factory
        $user = User::factory()->create([
            'name' => 'John',
            'email' => 'johndoe@example.com',
        ]);

        // Delete the user from the database
        $user->delete();

        // Attempt to retrieve the deleted user from the database
        $deletedUser = User::find($user->id);

        // Ensure that the deleted user is not found in the database
        $this->assertNull($deletedUser);
    }
    public function test_get_all_workers()
    {
        $all = User::all();
        $this->assertNotEmpty($all);
    }
}
