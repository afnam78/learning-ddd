<?php

declare(strict_types=1);

namespace Infrastructure\Publication\Repository;

use App\Models\Publication;
use Domain\Publication\Contracts\PublicationRepositoryInterface;
use Illuminate\Support\Facades\Auth;

final class PublicationRepository implements PublicationRepositoryInterface
{
    public function __construct()
    {
        //
    }

    /**
     * @param array $publication
     * @return Publication
     * @throws \Exception
     */
    public function create(array $publication): Publication
    {
        try {
            return Publication::create($publication);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * @param Publication $publication
     * @param array $data
     * @return Publication
     * @throws \Exception
     */
    public function update(Publication $publication, array $data): Publication
    {
        try {
            $publication->update($data);
            return $publication;
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * @return void
     * @throws \Exception
     */
    public function deleteAll(): void
    {
        try {
            Publication::query()->delete();
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * @param Publication $publication
     * @return void
     * @throws \Exception
     */
    public function delete(Publication $publication): void
    {
        try {
            $publication->delete();
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}
