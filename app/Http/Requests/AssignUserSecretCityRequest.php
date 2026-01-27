<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AssignUserSecretCityRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'city_id' => 'required|integer|exists:cities,id',
            'secret_city_id' => 'required|integer|exists:cities,id|different:city_id'
        ];
    }

     /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'city_id.required' => 'El ID de la ciudad es requerido',
            'city_id.exists' => 'La ciudad no existe',
            'secret_city_id.required' => 'El ID de la ciudad asociada es requerido',
            'secret_city_id.exists' => 'La ciudad asociada no existe',
            'secret_city_id.different' => 'Una ciudad no puede asociarse consigo misma'
        ];
    }
}
