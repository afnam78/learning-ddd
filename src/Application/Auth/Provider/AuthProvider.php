<?php
declare(strict_types=1);
namespace Application\Auth\Provider;

use Application\Auth\Contracts\AuthServiceInterface;
use Application\Auth\Service\AuthService;
use Domain\Auth\Contracts\AuthRepositoryInterface;
use Illuminate\Support\ServiceProvider;
use Infrastructure\Auth\Repository\AuthRepository;

class AuthProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            AuthServiceInterface::class,
            AuthService::class
        );

        $this->app->bind(
            AuthRepositoryInterface::class,
            AuthRepository::class
        );
    }

}
