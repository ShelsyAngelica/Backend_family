<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Services\AuthService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected AuthService $authService;

    /**
     * Constructor
     *
     * @param AuthService $authService
     */
    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    /**
     * Handle login request.
     *
     * @param LoginRequest $request
     * @return JsonResponse
     */
    public function login(LoginRequest $request): JsonResponse
    {
        $credentials = $request->validated();

        try {
            $result = $this->authService->login($credentials);

            return response()->json([
                'success' => true,
                'message' => $result['message'],
                'user' => $result['user'],
                'token' => $result['token'],
            ], 200);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Credenciales incorrectas',
                'errors' => $e->errors(),
            ], 401);
        }
    }

    /**
     * Handle logout request.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function logout(Request $request): JsonResponse
    {
        $result = $this->authService->logout($request);

        return response()->json([
            'success' => true,
            'message' => $result['message'],
        ], 200);
    }

    /**
     * Get authenticated user.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function getAuthenticatedUser(Request $request): JsonResponse
    {
        $user = $this->authService->getAuthenticatedUser($request);

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'No autenticado',
            ], 401);
        }

        return response()->json([
            'success' => true,
            'user' => $user,
        ], 200);
    }

    /**
     * Check authentication status.
     *
     * @return JsonResponse
     */
    public function check(): JsonResponse
    {
        $isAuthenticated = $this->authService->check();

        return response()->json([
            'success' => true,
            'authenticated' => $isAuthenticated,
        ], 200);
    }
}

