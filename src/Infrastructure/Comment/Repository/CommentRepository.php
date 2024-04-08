<?php

declare(strict_types=1);

namespace Infrastructure\Comment\Repository;

use App\Models\Comment;
use App\Models\Publication;
use Domain\Comment\Contracts\CommentRepositoryInterface;

final class CommentRepository implements CommentRepositoryInterface
{

    /**
     *
     * @param array $comment
     * @return Comment
     * @throws \Exception
     */
    public function create(array $comment): Comment
    {
        try {
            return Comment::create($comment);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}
