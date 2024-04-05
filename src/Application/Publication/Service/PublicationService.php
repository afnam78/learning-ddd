<?php
declare(strict_types=1);
namespace Application\Publication\Service;

use App\Models\Publication;
use Application\Publication\Contracts\PublicationServiceInterface;
use Domain\Publication\Contracts\PublicationRepositoryInterface;

class PublicationService implements PublicationServiceInterface
{
    private PublicationRepositoryInterface $repository;

    public function __construct(PublicationRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param array $data
     * @return Publication
     */
    public function create(array $data): Publication
    {
        return $this->repository->create($data);
    }

    /**
     * @param int $id
     * @param array $data
     * @return Publication
     */
    public function update(int $id, array $data): Publication
    {
        return $this->repository->update($id, $data);
    }

}
