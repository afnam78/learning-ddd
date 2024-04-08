<?php
declare(strict_types=1);

namespace Application\Publication\Service;

use App\Exceptions\DeleteOtherUserPostException;
use App\Exceptions\UserDisabledToEdit;
use App\Models\Publication;
use Application\Publication\Contracts\PublicationServiceInterface;
use Domain\Publication\Contracts\PublicationRepositoryInterface;
use Illuminate\Support\Facades\Auth;

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
     * @param Publication $publication
     * @param array $data
     *
     * @throws UserDisabledToEdit
     * @return Publication
     */
    public function update(Publication $publication, array $data): Publication
    {
        if ($publication->user_id !== Auth::id()) throw new UserDisabledToEdit();
        return $this->repository->update($publication, $data);
    }

    /**
     * @return void
     */
    public function deleteAll(): void
    {
        $this->repository->deleteAll();
    }

    /**
     * @param Publication $publication
     *
     * @throws DeleteOtherUserPostException
     * @return void
     */
    public function delete(Publication $publication): void
    {
        if ($publication->user_id !== Auth::id()) {
            throw new DeleteOtherUserPostException();
        }
        $this->repository->delete($publication);
    }
}
