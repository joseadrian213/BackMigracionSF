<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articuloimpuesto;
use App\Http\Resources\ArticuloImpuestoCollection;

class ArticuloImpuestoController extends Controller
{
 /**
     * Muestra una lista de artículos de impuestos filtrados por el parámetro 'busquedaIva'.
     *
     * @param \Illuminate\Http\Request $request La solicitud HTTP entrante.
     * @return array Una lista de artículos de impuestos o un mensaje si 'busquedaIva' es nulo.
     */
    public function index(Request $request)
    {
        // Obtener el valor del parámetro 'busquedaIva' de la solicitud
        $busquedaIva = $request->input('busquedaIva');

        // Verificar si 'busquedaIva' no es nulo
        if ($busquedaIva != null) {
            // Buscar artículos de impuestos que coincidan con el valor de 'busquedaIva'
            $articulosImpuesto = Articuloimpuesto::where('a_amecop', 'LIKE', "%{$busquedaIva}%")->get();
            // Crear una colección de los artículos encontrados
            $articuloImpuesto = new ArticuloImpuestoCollection($articulosImpuesto);

            // Devolver la colección de artículos
            return [
                'articuloImpuesto' => $articuloImpuesto,
            ];
        } else {
            // Devolver un mensaje indicando que 'busquedaIva' es nulo
            return [
                'message' => 'busquedaIva es nulo',
            ];
        }
    }

    /**
     * Almacena un nuevo artículo de impuesto en la base de datos.
     *
     * @param \Illuminate\Http\Request $request La solicitud HTTP entrante.
     * @return \Illuminate\Http\JsonResponse Una respuesta JSON indicando el éxito de la operación.
     */
    public function store(Request $request)
    {
        // Crear una nueva instancia del modelo Articuloimpuesto
        $articuloImpuesto = new Articuloimpuesto;

        // Asignar los valores de la solicitud a los atributos del modelo
        $articuloImpuesto->a_amecop = $request->a_amecop;
        $articuloImpuesto->id_tc = $request->id_tc;
        $articuloImpuesto->id_impuesto = $request->id_impuesto;
        $articuloImpuesto->vc_impuesto = $request->vc_impuesto;
        $articuloImpuesto->id_user_add = $request->id_user_add;
        $articuloImpuesto->id_user_upd = $request->id_user_upd;
        $articuloImpuesto->dt_add = now();
        $articuloImpuesto->dt_upd = now();

        // Guardar el modelo en la base de datos
        $articuloImpuesto->save();

        // Devolver una respuesta JSON indicando que el artículo ha sido creado exitosamente
        return response()->json(['message' => 'El articulo ha sido creado exitosamente'], 200);
    }

    /**
     * Actualiza un artículo de impuesto existente en la base de datos.
     *
     * @param \Illuminate\Http\Request $request La solicitud HTTP entrante.
     * @return \Illuminate\Http\JsonResponse Una respuesta JSON indicando el éxito o fracaso de la operación.
     */
    public function update(Request $request)
    {
        // Actualizar el artículo de impuesto en la base de datos basado en los valores proporcionados en la solicitud
        $updated = Articuloimpuesto::where('a_amecop', $request->a_amecop)
            ->where('vc_impuesto', $request->vc_impuesto)
            ->update([
                'a_amecop' => $request->a_amecop,
                'id_tc' => $request->id_tc,
                'id_impuesto' => $request->id_impuesto,
                'vc_impuesto' => $request->vc_impuesto,
                'id_user_add' => $request->id_user_add,
                'id_user_upd' => $request->id_user_upd,
                'dt_add' => now(),
                'dt_upd' => now(),
            ]);

        // Verificar si la actualización fue exitosa
        if (!$updated) {
            // Devolver una respuesta JSON indicando que el artículo no fue encontrado
            return response()->json(['message' => 'Articulo no encontrado'], 404);
        }

        // Devolver una respuesta JSON indicando que el artículo ha sido editado exitosamente
        return response()->json(['message' => 'El articulo ha sido editado exitosamente'], 200);
    }
}
