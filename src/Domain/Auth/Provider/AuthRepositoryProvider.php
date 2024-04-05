<?php
declare(strict_types=1);
namespace Domain\Auth\Provider;

use Domain\Auth\Contracts\AuthRepositoryInterface;
use Illuminate\Support\ServiceProvider;
use Infrastructure\Auth\Repository\AuthRepository;

class AuthRepositoryProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            AuthRepositoryInterface::class,
            AuthRepository::class
        );
    }

}
