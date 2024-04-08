<?php

namespace Presentation\Publication\Controller;

use App\Exceptions\UserDisabledToPublish;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePublicationRequest;
use Application\Publication\Contracts\PublicationServiceInterface;
use Illuminate\Http\JsonResponse;

class CreatePublicationController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param CreatePublicationRequest $request
     * @param PublicationServiceInterface $service
     *
     * @throws UserDisabledToPublish
     * @throws \Exception
     *
     * @return JsonResponse
     */
    public function __invoke(CreatePublicationRequest $request, PublicationServiceInterface $service): JsonResponse
    {
        $validated = $request->safe()->only(['title', 'content', 'user_id']);

        try {
            $publication = $service->create($validated);
        } catch (UserDisabledToPublish $disabledToPublish) {
            return response()->json(['message' => 'Error', 'error' => $disabledToPublish->getMessage()], 400);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error', 'error' => $e->getMessage()], 500);
        }

        return response()->json(['data' => $publication, 'message' => 'Publication created successfully'], 201);


    }
}
