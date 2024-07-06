<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password as PasswordRules;
class RegistroRequest extends FormRequest
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
            "name" => ["required", "string"],
            "email" => ["nullable", "email", "unique:users,email"],
            "nombre_y_apellidos" => ["required", "string", "unique:users,nombre_y_apellidos"],
            "id_empleado" => ["required", "integer", "unique:users,id_empleado"],
            "rol" => ["required", "integer"],
            "password" => ["required", "confirmed", PasswordRules::min(1)],
        ];
    }
}
