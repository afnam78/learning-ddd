<?php

declare(strict_types=1);

namespace Infrastructure\Publication\Repository;

use App\Exceptions\UserDisabledToPublish;
use App\Models\Publication;
use App\Models\User;
use Domain\Auth\Contracts\AuthRepositoryInterface;
use Domain\Publication\Contracts\PublicationRepositoryInterface;

final class PublicationRepository implements PublicationRepositoryInterface
{
    /**
     * @param array $publication
     * @return Publication
     */
    public function create(array $publication): Publication
    {
        try {
           return  Publication::create($publication);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * @param int $id
     * @param array $publication
     * @return Publication
     */
    public function update(int $id, array $publication): Publication
    {
        try {
            $publication = Publication::findOrFail($id);
            $publication->update($publication);
            return $publication;
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }


    }
}
