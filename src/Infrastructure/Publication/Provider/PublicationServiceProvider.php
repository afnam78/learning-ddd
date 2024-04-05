<?php
declare(strict_types=1);
namespace Infrastructure\Publication\Provider;

use Application\Publication\Contracts\PublicationServiceInterface;
use Application\Publication\Service\PublicationService;
use Domain\Publication\Contracts\PublicationRepositoryInterface;
use Illuminate\Support\ServiceProvider;
use Infrastructure\Publication\Repository\PublicationRepository;

class PublicationServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            PublicationServiceInterface::class,
            PublicationService::class
        );

        $this->app->bind(
            PublicationRepositoryInterface::class,
            PublicationRepository::class
        );
    }

}
