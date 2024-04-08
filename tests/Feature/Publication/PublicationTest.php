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

it('can delete own publication', function () {
    // Arrange
    $user = User::factory()->has(
        Publication::factory()->count(1)
    )->create();

    // Act & Assert
    actingAs($user)->delete(route('post.delete', $user->publications->first()->id))
        ->assertOk()
        ->assertJson(['message' => 'Publication was deleted successfully']);
});

it('cannot delete other users publications', function () {
    // Arrange
    $user = User::factory()->create();
    $publication = Publication::factory()->create();

    // Act & Assert
    actingAs($user)->delete(route('post.delete', $publication->first()->id))
        ->assertForbidden()
        ->assertJson(['message' => 'You can only delete your own posts']);
});

it('can update own publication', function () {
    // Arrange
    $user = User::factory()->has(
        Publication::factory()->count(1)
    )->create();

    // Act & Assert
    actingAs($user)->putJson(route('post.update', $user->publications->first()->id), ['title' => 'New title', 'content' => 'New content'])
        ->assertStatus(201)
        ->assertJson(['message' => 'Publication was updated successfully']);

});

it('cannot update other user publication', function () {
    // Arrange
    $user = User::factory()->create();
    $publication = Publication::factory()->create();

    // Act & Assert
    actingAs($user)->putJson(route('post.update', $publication->first()->id), ['title' => 'New title', 'content' => 'New content'])
        ->assertForbidden()
        ->assertJson(['error' => 'User not have authorization to edit this publication', 'message' => 'Error']);
});
