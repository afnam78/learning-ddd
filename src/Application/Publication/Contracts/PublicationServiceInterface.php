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
     * @param Publication $publication
     * @param array $data
     * @return Publication
     */
    public function update(Publication $publication, array $data): Publication;

    /**
     * @return void
     */
    public function deleteAll(): void;

    /**
     * Delete a publication by id.
     *
     * @param Publication $publication
     * @return void
     */
    public function delete(Publication $publication): void;
}
