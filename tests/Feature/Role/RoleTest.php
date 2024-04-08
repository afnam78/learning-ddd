<?php

use App\Models\Publication;
use App\Models\Role;
use App\Models\User;
use function Pest\Laravel\actingAs;

it('can delete all publications if auth user has admin role', function () {
    // Arrange
    $role = Role::factory()->create(['name' => 'admin', 'key' => 'admin']);
    $user = User::factory()->create();
    $user->roles()->syncWithoutDetaching($role->id);
    Publication::factory()->count(5)->create();

    // Act & Assert
    actingAs($user)->delete(route('post.delete-all'))
        ->assertOk()
        ->assertJson(['message' => 'All publications were deleted successfully']);
});
