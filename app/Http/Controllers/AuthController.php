<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegistroRequest;

class AuthController extends Controller
{
   /**
 * Registra un nuevo usuario en el sistema.
 *
 * @param \App\Http\Requests\RegistroRequest $request La solicitud HTTP entrante que contiene los datos de registro.
 * @return array Un array que contiene el token de acceso y la información del usuario registrado.
 */
public function register(RegistroRequest $request)
{
    // Validamos las reglas del Request y obtenemos los datos validados
    $data = $request->validated(); 

    // Creamos al usuario con los datos validados
    $user = User::create([
        "name" => $data["name"],
        "email" => $data["email"],
        "nombre_y_apellidos" => $data["nombre_y_apellidos"],
        "id_empleado" => $data["id_empleado"],
        "rol" => $data["rol"],
        "password" => bcrypt($data["password"]),
    ]); 

    // Devolvemos el token de acceso y la información del usuario registrado
    return [
        "token" => $user->createToken('token')->plainTextToken,
        "user" => $user
    ];
}

/**
 * Autentica un usuario en el sistema.
 *
 * @param \App\Http\Requests\LoginRequest $request La solicitud HTTP entrante que contiene las credenciales de inicio de sesión.
 * @return array|\Illuminate\Http\Response Un array que contiene el token de acceso y la información del usuario autenticado, o una respuesta de error.
 */
public function login(LoginRequest $request)
{
    // Validamos las reglas del Request y obtenemos los datos validados
    $data = $request->validated();

    // Intentamos autenticar al usuario con las credenciales proporcionadas
    if (!Auth::attempt($data)) {
        // Si la autenticación falla, devolvemos una respuesta de error
        return response([
            "errors" => ["El usuario o el password son incorrectos"]
        ], 422);
    }

    // Obtenemos el usuario autenticado
    $user = Auth::user();

    // Devolvemos el token de acceso y la información del usuario autenticado
    return [
        "token" => $user->createToken("token")->plainTextToken,
        "user" => $user
    ];
}

/**
 * Cierra la sesión del usuario autenticado.
 *
 * @param \Illuminate\Http\Request $request La solicitud HTTP entrante que contiene la información del usuario autenticado.
 * @return array Un array que indica que el usuario ha sido desconectado.
 */
public function logout(Request $request)
{
    // Obtenemos el usuario autenticado desde la solicitud
    $user = $request->user(); 

    // Eliminamos el token de acceso actual del usuario
    $user->currentAccessToken()->delete();

    // Devolvemos una respuesta que indica que el usuario ha sido desconectado
    return [
        "user" => null,
    ];
}


}
