<?php
declare(strict_types=1);

namespace Presentation\Auth\Controller;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Application\Auth\Contracts\AuthServiceInterface;
use Illuminate\Http\JsonResponse;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(LoginRequest $request, AuthServiceInterface $service): JsonResponse
    {
        $validated = $request->safe()->only(['email', 'password']);

        $service->login($validated);

        return response()->json(['message' => 'Logged in successfully']);
    }
}
