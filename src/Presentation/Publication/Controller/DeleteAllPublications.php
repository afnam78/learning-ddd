<?php

namespace Presentation\Publication\Controller;

use App\Exceptions\UserDisabledToPublish;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePublicationRequest;
use Application\Publication\Contracts\PublicationServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Request;

class DeleteAllPublications extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @param PublicationServiceInterface $service
     * @throws \Exception
     * @return JsonResponse
     */
    public function __invoke(Request $request, PublicationServiceInterface $service): JsonResponse
    {
        try {
            $service->deleteAll();
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }

        return response()->json(['message' => 'All publications were deleted successfully'], 200);
    }
}
