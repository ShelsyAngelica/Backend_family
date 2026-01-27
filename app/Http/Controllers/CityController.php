<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\CityHasCity;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CityController extends Controller
{
    /**
     * Obtener todas las ciudades
     * 
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        try {
            $cities = City::select('id', 'name')->get();
            
            return response()->json($cities, 200);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error al obtener ciudades',
                'message' => $e->getMessage()
            ], 500);
        }
    }

}

