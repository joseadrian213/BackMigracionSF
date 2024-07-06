<?php

namespace App\Http\Controllers;

use App\Models\Detventum;
use Illuminate\Http\Request;
use App\Http\Resources\DetventumCollection;

class DetVentaController extends Controller
{
  /**
 * Muestra una lista de artículos de venta filtrados por folio y caja.
 *
 * @param \Illuminate\Http\Request $request La solicitud HTTP entrante.
 * @return \Illuminate\Http\JsonResponse Una respuesta JSON con la lista de artículos de venta.
 */
public function index(Request $request)
{
    try {
        // Obtener los términos de búsqueda de la solicitud
        $searchTerminoFolio = $request->input('searchTerminoFolio');
        $searchTerminoCaja = $request->input('searchTerminoCaja');

        // Validar que los términos de búsqueda no estén vacíos
        if (empty($searchTerminoFolio)) {
            return response()->json(['message' => 'searchTerminoFolio está vacío'], 400);
        }
        if (empty($searchTerminoCaja)) {
            return response()->json(['message' => 'searchTerminoCaja está vacío'], 400);
        }

        // Consultar los artículos de venta que coincidan con los términos de búsqueda
        $articulosDetVenta = Detventum::join('articulo', 'detventa.vta_amecop', '=', 'articulo.a_amecop')
            ->where('detventa.vta_tran', "{$searchTerminoFolio}")
            ->where('detventa.vta_caja', "{$searchTerminoCaja}")
            ->select(
                'detventa.vta_tran',
                'detventa.vta_caja',
                'detventa.vta_amecop',
                'articulo.a_nombre',
                'detventa.vta_piezas',
                'detventa.vta_precio',
                'detventa.vta_importe',
                'detventa.vta_iva',
                'detventa.vta_ieps',
                'detventa.vta_descuento',
                'detventa.vta_total'
            )
            ->get();

        // Verificar si no se encontraron artículos de venta
        if ($articulosDetVenta->isEmpty()) {
            return response()->json(['message' => 'No se encontraron los datos.'], 404);
        }

        // Crear una colección de los artículos de venta
        $articulosDetVentaCollection = new DetventumCollection($articulosDetVenta);

        // Devolver la respuesta JSON con los datos obtenidos
        return response()->json([
            'detventa' => $articulosDetVentaCollection,
        ], 200);
    } catch (\Exception $e) {
        // Manejar errores y devolver una respuesta JSON con el mensaje de error
        return response()->json(['message' => 'Error al obtener los datos', 'error' => $e->getMessage()], 500);
    }
}

/**
 * Guarda un nuevo artículo de venta en la base de datos.
 *
 * @param \Illuminate\Http\Request $request La solicitud HTTP entrante.
 * @return \Illuminate\Http\JsonResponse Una respuesta JSON con el resultado de la operación.
 */
public function store(Request $request)
{
    try {
        // Crear una nueva instancia de Detventum y asignar los valores del request
        $detVenta = new Detventum;
        $detVenta->vta_tran = $request->vta_tran;
        $detVenta->vta_caja = $request->vta_caja;
        $detVenta->vta_amecop = $request->vta_amecop;
        $detVenta->vta_piezas = $request->vta_piezas;
        $detVenta->vta_precio = $request->vta_precio;
        $detVenta->vta_importe = $request->vta_importe;
        $detVenta->vta_iva = $request->vta_iva;
        $detVenta->vta_ieps = $request->vta_ieps;
        $detVenta->vta_descuento = $request->vta_descuento;
        $detVenta->vta_total = $request->vta_total;

        // Guardar el artículo de venta en la base de datos
        $detVenta->save();

        // Devolver la respuesta JSON con el resultado de la operación
        return response()->json(['message' => 'La venta ha sido registrada exitosamente', 'success' => true], 201);
    } catch (\Illuminate\Validation\ValidationException $e) {
        // Manejar errores de validación y devolver una respuesta JSON con el mensaje de error
        return response()->json(['message' => 'Error de validación', 'errors' => $e->errors()], 422);
    } catch (\Exception $e) {
        // Manejar errores generales y devolver una respuesta JSON con el mensaje de error
        return response()->json(['message' => 'Error al crear el artículo', 'error' => $e->getMessage()], 500);
    }
}

/**
 * Elimina un artículo de venta de la base de datos.
 *
 * @param \Illuminate\Http\Request $request La solicitud HTTP entrante.
 * @return \Illuminate\Http\JsonResponse Una respuesta JSON con el resultado de la operación.
 */
public function destroy(Request $request)
{
    try {
        // Obtener los valores desde el request
        $vta_amecop = $request->input('vta_amecop');
        $vta_caja = $request->input('vta_caja');
        $vta_tran = $request->input('vta_tran');

        // Verificar si los valores vta_caja y vta_tran están presentes
        if (!empty($vta_caja) && !empty($vta_tran) && empty($vta_amecop)) {
            // Eliminar todos los registros que coincidan con vta_caja y vta_tran
            $deletedCount = Detventum::where('vta_caja', $vta_caja)
                ->where('vta_tran', $vta_tran)
                ->delete();

            // Verificar si se eliminaron registros
            if ($deletedCount > 0) {
                return response()->json(['message' => 'Registros eliminados exitosamente'], 200);
            } else {
                return response()->json(['message' => 'No se encontraron registros para eliminar'], 404);
            }
        }

        // Verificar si alguno de los valores está vacío
        if (empty($vta_amecop) || empty($vta_caja) || empty($vta_tran)) {
            return response()->json(['message' => 'vta_amecop, vta_caja y vta_tran son requeridos'], 400);
        }

        // Buscar el registro en la base de datos
        $registro = Detventum::where('vta_amecop', $vta_amecop)
            ->where('vta_caja', $vta_caja)
            ->where('vta_tran', $vta_tran)
            ->first();

        // Verificar si el registro existe
        if (!$registro) {
            return response()->json(['message' => 'Registro no encontrado'], 404);
        }

        // Eliminar el registro
        $registro->delete();

        // Devolver la respuesta JSON con el resultado de la operación
        return response()->json(['message' => 'Registro eliminado exitosamente'], 200);
    } catch (\Exception $e) {
        // Manejar errores y devolver una respuesta JSON con el mensaje de error
        return response()->json(['message' => 'Error al eliminar el registro', 'error' => $e->getMessage()], 500);
    }
}

}
