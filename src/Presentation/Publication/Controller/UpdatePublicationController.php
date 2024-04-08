<?php

namespace Presentation\Publication\Controller;

use App\Exceptions\UserDisabledToEdit;
use App\Exceptions\UserDisabledToPublish;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePublicationRequest;
use App\Models\Publication;
use Application\Publication\Contracts\PublicationServiceInterface;
use Illuminate\Http\JsonResponse;

class UpdatePublicationController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param UpdatePublicationRequest $request
     * @param PublicationServiceInterface $service
     * @param Publication $publication
     *
     * @throws UserDisabledToEdit
     * @throws \Exception
     *
     * @return JsonResponse
     */
    public function __invoke(UpdatePublicationRequest $request, PublicationServiceInterface $service, Publication $publication): JsonResponse
    {
        $validated = $request->safe()->only(['title', 'content']);

        try {
            $publication = $service->update($publication, $validated);
        } catch (UserDisabledToEdit $disabledToPublish) {
            return response()->json(['message' => 'Error', 'error' => $disabledToPublish->getMessage()], 403);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error', 'error' => $e->getMessage()], 500);
        }

        return response()->json(['data' => $publication, 'message' => 'Publication was updated successfully'], 201);


    }
}
