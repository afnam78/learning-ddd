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
     * @param Publication $publication
     * @return void
     */
    public function delete(Publication $publication): void;
}
