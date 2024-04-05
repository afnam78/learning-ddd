<?php
declare(strict_types=1);
namespace Domain\Auth\Contracts;

interface AuthRepositoryInterface
{
    /**
     * Create a new user.
     *
     * @param array $data
     * @return bool
     */
    public function login(array $data): bool;

    /**
     * Register a new user.
     *
     * @param array $data
     * @return bool
     */
    public function register(array $data): bool;
}
