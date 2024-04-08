<?php

namespace Presentation\Publication\Controller;

use App\Exceptions\DeleteOtherUserPostException;
use App\Http\Controllers\Controller;
use App\Models\Publication;
use Application\Publication\Contracts\PublicationServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class DeleteOwnPublication extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @param PublicationServiceInterface $service
     * @param Publication $publication
     *
     * @throws DeleteOtherUserPostException
     * @throws \Exception
     *
     * @return JsonResponse
     */
    public function __invoke(Request $request, PublicationServiceInterface $service, Publication $publication): JsonResponse
    {
        try {
            $service->delete($publication);
        }catch (DeleteOtherUserPostException $e) {
            return response()->json(['message' => $e->getMessage()], 403);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }

        return response()->json(['message' => 'Publication was deleted successfully'], 200);
    }
}
