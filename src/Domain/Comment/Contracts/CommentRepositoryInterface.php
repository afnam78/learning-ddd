<?php
declare(strict_types=1);
namespace Domain\Comment\Contracts;

use App\Models\Comment;
use App\Models\Publication;

interface CommentRepositoryInterface
{
    /**
     *
     * @param array $comment
     * @return Comment
     */
    public function create(array $comment): Comment;
}
