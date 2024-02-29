<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;

class AppTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    // public function test_example(): void

        public function testCreate()
        {
            $user = User::find(1);
            \Auth::login($user);
            $response = $this->get('/quiz-list');
            $response->assertStatus(200);
        }
        public function testCrud()
        {
            $user = User::find(1);
            \Auth::login($user);
            $response = $this->get('admin/users');

            $response->assertStatus(200);
        }
        public function testupdate()
        {
            $user = User::find(1);
            \Auth::login($user);
            $response = $this->get('admin/users/create');
            $response ->assertstatus(200);
        }
        public function testCrote()
        {
            $user = User::find(1);
            \Auth::login($user);
            $details=[
                'name' => fake()->name(),
                'email' => fake()->unique()->safeEmail(),
                'role' => 'student',
            ];
            $response = $this->post('admin/users', $details);
            $response->assertStatus(302);
            $response->assertRedirect('admin/users');
            $response->assertSessionHas('completed', 'User has been saved!');
        }
        public function testRequiredFields()
        {
            $user = User::find(1);
            \Auth::login($user);
            $invalidData = [
                'role'=> 'student',
            ];

            $response = $this->post('admin/users', $invalidData);
            $response->assertStatus(302);
            $response->assertSessionHasErrors(['name', 'email']);
        }
        public function testEmailFormatValidation()
        {
            $user = User::find(1);
            \Auth::login($user);
            $invalidData = [
                'name' => fake()->name(),
                'email' => 'invalidemail',
                'role' => 'admin',
            ];
            $response = $this->post('admin/users', $invalidData);
            $response->assertStatus(302);
            $response->assertSessionHasErrors(['email']);
        }
        public function testUniqueEmailValidation()
        {
            $user = User::find(1);
            \Auth::login($user);
            $invalidData = [
                'name' => fake()->name(),
                'email' => 'admin@gmail.com',
                'role' => 'admin',
            ];
            $response = $this->post('admin/users', $invalidData);
            $response->assertStatus(302);
            $response->assertSessionHasErrors(['email']);
        }
        public function testedit()
        {
            $user = User::find(1);
            \Auth::login($user);
            $response = $this->get('admin/users/edit');
            $response ->assertstatus(200);
        }
        public function testEditUser()
        {
            $user = User::find(1);
            \Auth::login($user);
            $user = User::factory()->create();
            $response = $this->get('admin/users/' . $user->id . '/edit');
            $response->assertStatus(200); // Assuming 200 for successful edit form access
        }
        public function testUpdateUser()
        {
            $user = User::factory()->create();
            $updatedData = [
                'name' =>fake()->name(),
                'email' =>fake()->unique()->safeEmail,
                'role' => 'student',
            ];
            $response = $this->put('admin/users/' . $user->id, $updatedData);
            $response->assertStatus(302);
        }
        public function testEditUserValidation()
        {
            $user = User::find(1);
            \Auth::login($user);
            $user = User::factory()->create();
            $invalidData = [
            ];
            $response = $this->put('admin/users/' . $user->id, $invalidData);
            $response->assertStatus(302);
            $response->assertSessionHasErrors(['name', 'email']);
        }
        public function testEditUserdetailValidation()
        {
            $user = User::find(1);
            \Auth::login($user);
            $user = User::factory()->create();
            $invalidData = [
                'name'=>'sadkjsad',
            ];
            $response = $this->put('admin/users/' . $user->id, $invalidData);
            $response->assertStatus(302);
            $response->assertSessionHasErrors([ 'email']);
        }
        public function testEditUserdetailsValidation()
        {
            $user = User::find(1);
            \Auth::login($user);
            $user = User::factory()->create();
            $invalidData = [
                'email'=>'kk12@gmail.com'
            ];
            $response = $this->put('admin/users/' . $user->id, $invalidData);
            $response->assertStatus(302);
            $response->assertSessionHasErrors(['name']);
        }
        public function testdestroy()
        {
            $user = User::find(33);
            \Auth::login($user);
            $response = $this->get('admin/users/delete');
            $response ->assertstatus(200);
        }
        public function testshow()
        {
            $user = User::find(1);
            \Auth::login($user);
            $response = $this->get('admin/results');
            $response ->assertstatus(404);
        }
        public function testshowdata()
        {
            $user = User::find(1);
            \Auth::login($user);
            $response = $this->get('/results');
            $response ->assertstatus(200);
        }
}
