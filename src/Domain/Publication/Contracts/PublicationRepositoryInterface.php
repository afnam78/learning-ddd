<?php
declare(strict_types=1);
namespace Domain\Publication\Contracts;

use App\Models\Publication;

interface PublicationRepositoryInterface
{
    /**
     * @param array $publication
     * @return Publication
     */
    public function create(array $publication): Publication;

    /**
     * @param int $id
     * @param array $publication
     * @return Publication
     */
    public function update(int $id, array $publication): Publication;
}
