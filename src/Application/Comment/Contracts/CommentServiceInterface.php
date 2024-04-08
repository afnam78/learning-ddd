<?php
declare(strict_types=1);
namespace Application\Comment\Contracts;
use App\Models\Comment;
use App\Models\Publication;

interface CommentServiceInterface
{
    /**
     * Create a new publication.
     *
     * @param array $data
     * @return Comment
     */
    public function create(array $data): Comment;
}
