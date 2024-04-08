<?php
declare(strict_types=1);
namespace Application\Comment\Provider;

use Application\Comment\Contracts\CommentServiceInterface;
use Application\Comment\Service\CommentService;
use Domain\Comment\Contracts\CommentRepositoryInterface;
use Illuminate\Support\ServiceProvider;
use Infrastructure\Comment\Repository\CommentRepository;

class CommentProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            CommentServiceInterface::class,
            CommentService::class
        );

        $this->app->bind(
            CommentRepositoryInterface::class,
            CommentRepository::class
        );
    }

}
