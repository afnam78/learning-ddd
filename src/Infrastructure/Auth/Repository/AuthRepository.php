<?php

declare(strict_types=1);
namespace Infrastructure\Auth\Repository;

use App\Models\User;
use Domain\Auth\Contracts\AuthRepositoryInterface;

final class AuthRepository implements AuthRepositoryInterface
{
    /**
     * @param array $data
     * @return bool
     */
    public function login(array $data): bool
    {
        if (auth()->attempt($data)) {
            return true;
        }

        return false;
    }

    /**
     * @param array $data
     * @return bool
     */
    public function register(array $data): bool
    {
        User::create($data);
        return true;
    }
}
