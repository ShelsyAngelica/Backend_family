<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;

class AuthService
{
    protected UserRepository $userRepository;

    /**
     * Constructor
     *
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Attempt to authenticate a user and generate token.
     *
     * @param array $credentials
     * @return array
     * @throws ValidationException
     */
    public function login(array $credentials): array
    {
        $user = $this->userRepository->findByEmail($credentials['email']);
        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['Las credenciales proporcionadas son incorrectas.'],
            ]);
        }

        // Revoke all previous tokens
        $user->tokens()->delete();

        // Create new token
        $token = $user->createToken('api_token')->plainTextToken;

        return [
            'success' => true,
            'user' => $user,
            'token' => $token,
            'message' => 'Inicio de sesión exitoso.',
        ];
    }

    /**
     * Log the user out by revoking the current token.
     *
     * @param Request $request
     * @return array
     */
    public function logout(Request $request): array
    {
        // Eliminar el token actual del usuario
        $request->user()->currentAccessToken()->delete();

        return [
            'success' => true,
            'message' => 'Sesión cerrada exitosamente.',
        ];
    }



    /**
     * Get the authenticated user.
     *
     * @return \App\Models\User|null
     */
    public function getAuthenticatedUser(Request $request)
    {
        return $request->user()->load('city','secret_city');
    }

    /**
     * Check if user is authenticated.
     *
     * @return bool
     */
    public function check(): bool
    {
        return Auth::check();
    }
}

