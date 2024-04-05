<?php
declare(strict_types=1);
namespace Application\Publication\Contracts;

use App\Models\Publication;

interface PublicationServiceInterface
{
    /**
     * Create a new publication.
     *
     * @param array $data
     * @return Publication
     */
    public function create(array $data): Publication;

    /**
     * Update a publication.
     *
     * @param int $id
     * @param array $data
     * @return Publication
     */
    public function update(int $id, array $data): Publication;
}
