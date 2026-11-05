<?php

namespace Tests\Feature;

use App\Livewire\HomeAuth;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class AuthFlowTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_visitor_can_create_an_account_and_reach_the_admin_area(): void
    {
        Livewire::test(HomeAuth::class)
            ->set('mode', 'register')
            ->set('name', 'Ana Souza')
            ->set('email', 'ana@example.com')
            ->set('password', 'senha-segura')
            ->set('password_confirmation', 'senha-segura')
            ->call('authenticate')
            ->assertRedirect(route('admin'));

        $this->assertAuthenticated();
        $this->assertDatabaseHas('users', ['email' => 'ana@example.com']);
        $this->get(route('admin'))->assertOk();
    }

    public function test_a_registered_user_can_sign_in_and_guests_cannot_open_admin(): void
    {
        $user = User::factory()->create(['password' => 'senha-segura']);

        $this->get(route('admin'))->assertRedirect(route('home'));

        Livewire::test(HomeAuth::class)
            ->set('email', $user->email)
            ->set('password', 'senha-segura')
            ->call('authenticate')
            ->assertRedirect(route('admin'));

        $this->assertAuthenticatedAs($user);
    }
}