<?php
declare(strict_types=1);

namespace Application\Comment\Service;

use App\Exceptions\DeleteOtherUserPostException;
use App\Exceptions\UserDisabledToEdit;
use App\Models\Comment;
use App\Models\Publication;
use Application\Comment\Contracts\CommentServiceInterface;
use Application\Publication\Contracts\PublicationServiceInterface;
use Domain\Comment\Contracts\CommentRepositoryInterface;
use Domain\Publication\Contracts\PublicationRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class CommentService implements CommentServiceInterface
{
    private CommentRepositoryInterface $repository;

    public function __construct(CommentRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param array $data
     * @return Comment
     */
    public function create(array $data): Comment
    {
        return $this->repository->create($data);
    }
}
