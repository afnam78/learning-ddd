<?php
declare(strict_types=1);
namespace Application\Auth\Service;

use Application\Auth\Contracts\AuthServiceInterface;
use Domain\Auth\Contracts\AuthRepositoryInterface;

class AuthService implements AuthServiceInterface
{
    private AuthRepositoryInterface $repository;
    public function __construct(AuthRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Register a new user.
     *
     * @param array $data
     * @return bool
     */
    public function register(array $data): bool
    {
        return $this->repository->register($data);

    }

    /**
     * Login a user.
     *
     * @param array $data
     * @return bool
     */
    public function login(array $data): bool
    {
        return $this->repository->login($data);
    }
}
