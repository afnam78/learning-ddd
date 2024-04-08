<?php

use Application\Auth\Contracts\AuthServiceInterface;
use function PHPUnit\Framework\assertTrue;

it('auth service mock', function () {
    // Arrange
    $user = [
        'name' => 'John Doe',
        'email' => fake()->email,
        'password' => bcrypt('password')
    ];

    // Act & Assert
    $authServiceMock = Mockery::mock(AuthServiceInterface::class);
    $authServiceMock->shouldReceive('register', 'login')->once()->andReturnTrue();
    assertTrue($authServiceMock->register($user));
    assertTrue($authServiceMock->login($user));
});
