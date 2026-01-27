<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssignUserSecretCityRequest;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;


class UserController extends Controller
{

    protected UserService $UserService;

    /**
     * Constructor
     *
     * @param UserRepository $userRepository
     */
    public function __construct(UserService $UserService)
    {
        $this->UserService = $UserService;
    }

     /**
     * Guardar asociación de ciudades
     * 
     * @param Request $request
     * @return JsonResponse
     */
    public function storeAssociation(AssignUserSecretCityRequest $request): JsonResponse
    {
        try {
            // Crear la asociación
            $user  =  $this->UserService->storeAssociation($request);

            return response()->json([
                'message' => 'Usuario con ciudad asociada exitosamente',
                'data' => [
                    // 'id' => $user->id,
                    'city_id' => $user->city_id,
                    'associated_city_id' => $user->secret_city_id
                ]
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error al crear asociación',
                'message' => $e->getMessage()
            ], 500);
        }
    }

     /**
     * Obtener todas las asociaciones con nombres de ciudades
     * 
     * @return JsonResponse
     */
    public function getCityAssociations(): JsonResponse
    {
        try {
            $associations = $this->UserService->getCityAssociations();
            return response()->json($associations, 200);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error al obtener asociaciones',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Eliminar todas las asociaciones
     * 
     * @return JsonResponse
     */
    public function deleteAllAssociations(): JsonResponse
    {
        try {
            $this->UserService->deleteAllAssociations();
            return response()->json([
                'message' => 'Todas las asociaciones han sido eliminadas'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error al eliminar asociaciones',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}