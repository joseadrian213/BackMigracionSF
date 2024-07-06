<?php

use App\Http\Controllers\ArticuloImpuestoController;
use App\Http\Controllers\ArticulosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DetVentaController;
use App\Models\Articulo;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/**
 * Rutas protegidas por el middleware de autenticación 'auth:sanctum'.
 */
Route::middleware('auth:sanctum')->group(function () {
    // Ruta para obtener la información del usuario autenticado
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    // Ruta para cerrar la sesión del usuario autenticado
    Route::post('/logout', [AuthController::class, 'logout']);
});

/**
 * Ruta para registrar un nuevo usuario.
 */
Route::post('/registro', [AuthController::class, 'register']);

/**
 * Ruta para iniciar sesión.
 */
Route::post('/login', [AuthController::class, 'login']);

/**
 * Rutas relacionadas con los artículos, con limitación de 100 solicitudes por minuto.
 */
Route::group(['prefix' => 'articulos', 'middleware' => 'throttle:100,1'], function () {
    // Ruta para gestionar recursos de artículos a través de métodos API RESTful
    Route::apiResource('/', ArticulosController::class);

    // Ruta para obtener la lista de artículos
    Route::get('/', [ArticulosController::class, 'index']);

    // Ruta comentada para obtener la existencia de artículos (descomentada según sea necesario)
    // Route::get('/existencia',[ArticulosController::class,'indexExistencia']);

    // Ruta para actualizar un artículo
    Route::put('/', [ArticulosController::class, 'update']);

    // Ruta para crear un nuevo artículo
    Route::post('/', [ArticulosController::class, 'store']);
});

/**
 * Rutas relacionadas con la existencia de artículos, con limitación de 100 solicitudes por minuto.
 */
Route::group(['prefix' => 'articulos-existencia', 'middleware' => 'throttle:100,1'], function () {
    // Ruta para obtener la existencia de artículos
    Route::get('/existencia', [ArticulosController::class, 'indexExistencia']);
});

/**
 * Rutas relacionadas con las ventas de artículos, con limitación de 100 solicitudes por minuto.
 */
Route::group(['prefix' => 'articulos-detventa', 'middleware' => 'throttle:100,1'], function () {
    // Ruta para crear un nuevo detalle de venta
    Route::post('/', [DetVentaController::class, 'store']);

    // Ruta para obtener los detalles de venta
    Route::get('/', [DetVentaController::class, 'index']);

    // Ruta para eliminar un detalle de venta
    Route::delete('/', [DetVentaController::class, 'destroy']);
});

/**
 * Rutas relacionadas con los impuestos de artículos, con limitación de 100 solicitudes por minuto.
 */
Route::group(['prefix' => 'articuloImpuesto', 'middleware' => 'throttle:100,1'], function () {
    // Ruta para obtener la lista de impuestos de artículos
    Route::get('/', [ArticuloImpuestoController::class, 'index']);

    // Ruta para actualizar un impuesto de artículo
    Route::put('/', [ArticuloImpuestoController::class, 'update']);

    // Ruta para crear un nuevo impuesto de artículo
    Route::post('/', [ArticuloImpuestoController::class, 'store']);
});
