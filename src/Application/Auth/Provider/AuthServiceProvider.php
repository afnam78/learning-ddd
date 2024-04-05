<?php
declare(strict_types=1);
namespace Application\Auth\Provider;

use Application\Auth\Contracts\AuthServiceInterface;
use Application\Auth\Service\AuthService;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            AuthServiceInterface::class,
            AuthService::class
        );
    }

}
