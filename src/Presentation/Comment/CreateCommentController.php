<?php

namespace Presentation\Comment;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCommentRequest;
use App\Models\Publication;
use Application\Comment\Contracts\CommentServiceInterface;
use Illuminate\Http\JsonResponse;

class CreateCommentController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param CreateCommentRequest $request
     * @param CommentServiceInterface $service
     *
     * @throws \Exception
     *
     * @return JsonResponse
     */
    public function __invoke(CreateCommentRequest $request, CommentServiceInterface $service): JsonResponse
    {
        $validated = $request->safe()->only(['content', 'user_id', 'publication_id']);

        try {
            $comment = $service->create($validated);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error', 'error' => $e->getMessage()], 500);
        }

        return response()->json(['data' => $comment, 'message' => 'Comment created successfully'], 201);
    }
}
