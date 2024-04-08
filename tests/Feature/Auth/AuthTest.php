<?php

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use function Pest\Laravel\postJson;

it('can login user', function () {
    // Arrange
    $user = User::factory()->create();

    // Act & Assert
    postJson(route('login'), [
        'email' => $user->email,
        'password' => 'password',
    ])->assertOk()
    ->assertSee(['message' => 'Logged in successfully']);
});

it('can register user', function () {
    // Arrange
    $data = [
        'name' => 'John Doe',
        'email' => 'test@example.com',
        'password' => Hash::make('password'),
    ];
    // Act & Assert
    postJson(route('register'), $data)->assertOk();
});
