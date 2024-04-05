<?php
declare(strict_types=1);
namespace Presentation\Auth\Controller;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Application\Auth\Contracts\AuthServiceInterface;
use Illuminate\Http\JsonResponse;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(RegisterRequest $request, AuthServiceInterface $service): JsonResponse
    {
        $validated = $request->safe()->only(['name', 'email', 'password']);

        $service->register($validated);

        return response()->json(['message' => 'User created successfully']);
    }
}
