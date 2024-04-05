<?php

use App\Models\Publication;
use App\Models\User;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\postJson;

it('can create publication', function () {
    // Arrange
    $user = User::factory()->create();
    $publication = Publication::factory()->make(
        ['user_id' => $user->id]
    )->toArray();

    // Act & Assert
    actingAs($user)->postJson(route('post.create'), $publication)
        ->assertStatus(201);
});

it('can not create publication without user', function () {
    // Arrange
    $publication = Publication::factory()->make()->toArray();

    // Act & Assert
    postJson(route('post.create'), $publication)
        ->assertStatus(401);
});
