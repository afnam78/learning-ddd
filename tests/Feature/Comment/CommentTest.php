<?php

use App\Models\Publication;
use App\Models\User;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\postJson;

it('can create a comment', function () {
    // Arrange
    $user = User::factory()->create();
    $publication = Publication::factory()->create();

    // Act & Assert
    actingAs($user);
    postJson(route('comment.create', [
        'content' => 'This is a comment',
        'user_id' => $user->id,
        'publication_id' => $publication->id,
    ]))
        ->assertStatus(201)
        ->assertJson([
            'message' => 'Comment created successfully',
        ]);

});
