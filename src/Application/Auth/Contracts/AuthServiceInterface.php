<?php
declare(strict_types=1);
namespace Application\Auth\Contracts;

interface AuthServiceInterface
{
    /**
     * Register a new user.
     *
     * @param array $data
     * @return bool
     */
    public function register(array $data): bool;

    /**
     * Login a user.
     *
     * @param array $data
     * @return bool
     */
    public function login(array $data): bool;
}
