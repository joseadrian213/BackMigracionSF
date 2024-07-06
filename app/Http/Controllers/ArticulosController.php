<?php

namespace App\Http\Controllers;

use Log;
use App\Models\Sector;
use App\Models\Empaque;
use App\Models\Gramaje;
use App\Models\Articulo;
use App\Models\Impuesto;
use App\Models\Detventum;
use App\Models\Tasacuotum;
use Illuminate\Http\Request;
use App\Models\Articuloimpuesto;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\SectorCollection;
use App\Http\Resources\EmpaqueCollection;
use App\Http\Resources\GramajeCollection;
use App\Http\Resources\ArticuloCollection;
use App\Http\Resources\ImpuestoCollection;
use App\Http\Resources\DetventumCollection;
use App\Http\Resources\TasaCuotaCollection;
use App\Http\Resources\ArticuloImpuestoCollection;

class ArticulosController extends Controller
{
/**
     * Muestra una lista de artículos filtrados por el término de búsqueda.
     *
     * @param \Illuminate\Http\Request $request La solicitud HTTP entrante.
     * @return \Illuminate\Http\JsonResponse Una respuesta JSON con la lista de artículos y otras colecciones.
     */
    public function index(Request $request)
    {
        try {
            // Obtener el término de búsqueda de la solicitud
            $searchTerm = $request->input('searchTerm');

            // Buscar artículos que coincidan con el término de búsqueda en diferentes campos
            $articulos = Articulo::where('articulo.a_amecop', 'LIKE', "%{$searchTerm}%")
                ->orWhere('articulo.a_nombre', 'LIKE', "%{$searchTerm}%")
                ->orWhere('articulo.a_sustancia', 'LIKE', "%{$searchTerm}%")
                ->paginate(10);

            // Formatear ciertos campos de los artículos
            $articulos->transform(function ($articulo) {
                $articulo->a_publico = number_format($articulo->a_publico, 2);
                $articulo->a_costo = number_format($articulo->a_costo, 2);
                $articulo->a_margen_utilidad = number_format($articulo->a_margen_utilidad * 100, 2);
                $articulo->a_desc = number_format($articulo->a_desc * 100, 2);

                return $articulo;
            });

            // Crear colecciones de los artículos y otras entidades relacionadas
            $articulosCollection = new ArticuloCollection($articulos);
            $sectores = new SectorCollection(Sector::all());
            $gramaje = new GramajeCollection(Gramaje::all());
            $empaque = new EmpaqueCollection(Empaque::all());
            $impuesto = new ImpuestoCollection(Impuesto::all());
            $tasaCuota = new TasaCuotaCollection(Tasacuotum::all());

            // Devolver la respuesta JSON con los datos obtenidos
            return response()->json([
                'articulos' => $articulosCollection,
                'sectores' => $sectores,
                'gramaje' => $gramaje,
                'empaque' => $empaque,
                'impuesto' => $impuesto,
                'tasaCuota' => $tasaCuota,
                'lastPage' => $articulos->lastPage(),
                'currentPage' => $articulos->currentPage(),
                'totalItems' => $articulos->total(),
            ], 200);
        } catch (\Exception $e) {
            // Manejar errores y devolver una respuesta JSON con el mensaje de error
            return response()->json(['message' => 'Error al obtener los artículos', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Muestra una lista de artículos con existencia filtrados por el término de búsqueda.
     *
     * @param \Illuminate\Http\Request $request La solicitud HTTP entrante.
     * @return \Illuminate\Http\JsonResponse Una respuesta JSON con la lista de artículos con existencia.
     */
    public function indexExistencia(Request $request)
    {
        try {
            // Obtener el término de búsqueda de la solicitud
            $searchTerm = $request->input('searchTerm');

            // Verificar si el término de búsqueda es numérico y tiene una longitud de 15
            if (is_numeric($searchTerm) && strlen($searchTerm) == 15) {
                // Buscar artículos con leftJoin si el término de búsqueda cumple con las condiciones
                $articulosExistencia = Articulo::join('acumuladoarticulo', 'articulo.a_amecop', '=', 'acumuladoarticulo.a_amecop')
                    ->leftJoin('articuloimpuesto', 'articulo.a_amecop', '=', 'articuloimpuesto.a_amecop')
                    ->leftJoin('tasacuota', function ($join) {
                        $join->on('articuloimpuesto.id_impuesto', '=', 'tasacuota.id_impuesto')
                            ->on('articuloimpuesto.id_tc', '=', 'tasacuota.id_tc');
                    })
                    ->where(function ($query) use ($searchTerm) {
                        $query->where('articulo.a_amecop', 'LIKE', "%{$searchTerm}%")
                            ->orWhere('articulo.a_nombre', 'LIKE', "%{$searchTerm}%")
                            ->orWhere('articulo.a_sustancia', 'LIKE', "%{$searchTerm}%");
                    })
                    ->select(
                        'articulo.a_amecop',
                        'articulo.a_nombre',
                        'articulo.a_publico',
                        'articulo.a_sector',
                        'articulo.a_desc',
                        'acumuladoarticulo.a_existencia',
                        'tasacuota.nu_maximo',
                        'tasacuota.id_impuesto'
                    )
                    ->paginate(10);
            } else {
                // Buscar artículos sin leftJoin si el término de búsqueda no cumple con las condiciones
                $articulosExistencia = Articulo::join('acumuladoarticulo', 'articulo.a_amecop', '=', 'acumuladoarticulo.a_amecop')
                    ->join('articuloimpuesto', 'articulo.a_amecop', '=', 'articuloimpuesto.a_amecop')
                    ->join('tasacuota', function ($join) {
                        $join->on('articuloimpuesto.id_impuesto', '=', 'tasacuota.id_impuesto')
                            ->on('articuloimpuesto.id_tc', '=', 'tasacuota.id_tc');
                    })
                    ->where(function ($query) use ($searchTerm) {
                        $query->where('articulo.a_amecop', 'LIKE', "%{$searchTerm}%")
                            ->orWhere('articulo.a_nombre', 'LIKE', "%{$searchTerm}%")
                            ->orWhere('articulo.a_sustancia', 'LIKE', "%{$searchTerm}%");
                    })
                    ->select(
                        'articulo.a_amecop',
                        'articulo.a_nombre',
                        'articulo.a_publico',
                        'articulo.a_sector',
                        'articulo.a_desc',
                        'acumuladoarticulo.a_existencia',
                        'tasacuota.nu_maximo',
                        'tasacuota.id_impuesto'
                    )
                    ->paginate(10);
            }

            // Formatear ciertos campos de los artículos
            $articulosExistencia->transform(function ($articulo) {
                $articulo->a_publico = number_format($articulo->a_publico, 2);
                $articulo->a_desc = number_format($articulo->a_desc * 100, 2);

                return $articulo;
            });

            // Crear una colección de los artículos encontrados
            $articulosCollection = new ArticuloCollection($articulosExistencia);

            // Devolver la respuesta JSON con los datos obtenidos
            return response()->json([
                'articulos' => $articulosCollection,
                'lastPage' => $articulosExistencia->lastPage(),
                'currentPage' => $articulosExistencia->currentPage(),
                'totalItems' => $articulosExistencia->total(),
            ], 200);
        } catch (\Exception $e) {
            // Manejar errores y devolver una respuesta JSON con el mensaje de error
            return response()->json(['message' => 'Error al obtener los artículos', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Almacena un nuevo artículo en la base de datos.
     *
     * @param \Illuminate\Http\Request $request La solicitud HTTP entrante.
     * @return \Illuminate\Http\JsonResponse Una respuesta JSON indicando el éxito o fracaso de la operación.
     */
    public function store(Request $request)
    {
        try {
            // Validar los datos de la solicitud
            $validatedData = $request->validate([
                'a_amecop' => 'required|unique:articulo',
                'a_nombre' => 'required',
                'a_publico' => 'required',
                'a_costo' => 'required',
            ]);

            // Crear una nueva instancia del modelo Articulo con los datos validados
            $articulo = new Articulo($validatedData);
            $articulo->a_amecop = $request->a_amecop;
            $articulo->a_sustancia = $request->a_sustancia;
            $articulo->a_sector = $request->a_sector;
            $articulo->nu_gramaje = $request->nu_gramaje;
            $articulo->id_gramaje = $request->id_gramaje;
            $articulo->id_empaque = $request->id_empaque;
            $articulo->a_grupo = $request->a_grupo;
            $articulo->a_local = $request->a_local;
            $articulo->a_laboratorio = $request->a_laboratorio;
            $articulo->a_desc = $request->a_desc;
            $articulo->a_caducidad = $request->a_caducidad;
            $articulo->a_refrigerado = $request->a_refrigerado;
            $articulo->vc_unidad = $request->vc_unidad;
            $articulo->a_margen_utilidad = $request->a_margen_utilidad;
            $articulo->a_aplica_desc = $request->a_aplica_desc;

            // Guardar el modelo en la base de datos
            $articulo->save();

            // Devolver una respuesta JSON indicando que el artículo ha sido creado exitosamente
            return response()->json(['message' => 'El articulo ha sido creado exitosamente', 'success' => true], 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Manejar errores de validación y devolver una respuesta JSON con los mensajes de error
            return response()->json(['message' => 'Error de validación', 'errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            // Manejar otros errores y devolver una respuesta JSON con el mensaje de error
            return response()->json(['message' => 'Error al crear el artículo', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Actualiza un artículo existente en la base de datos.
     *
     * @param \Illuminate\Http\Request $request La solicitud HTTP entrante.
     * @return \Illuminate\Http\JsonResponse Una respuesta JSON indicando el éxito o fracaso de la operación.
     */
    public function update(Request $request)
    {
        try {
            // Buscar el artículo por su identificador
            $articulo = Articulo::find($request->a_amecop);
            if (!$articulo) {
                return response()->json(['message' => 'Articulo no encontrado'], 404);
            }

            // Validar los datos de la solicitud
            $validatedData = $request->validate([
                'a_nombre' => 'required',
                'a_publico' => 'required',
                'a_costo' => 'required',
            ]);

            // Actualizar el modelo con los datos validados
            $articulo->fill($validatedData);
            $articulo->a_sustancia = $request->a_sustancia;
            $articulo->a_sector = $request->a_sector;
            $articulo->nu_gramaje = $request->nu_gramaje;
            $articulo->id_gramaje = $request->id_gramaje;
            $articulo->id_empaque = $request->id_empaque;
            $articulo->a_grupo = $request->a_grupo;
            $articulo->a_local = $request->a_local;
            $articulo->a_laboratorio = $request->a_laboratorio;
            $articulo->a_desc = $request->a_desc;
            $articulo->a_caducidad = $request->a_caducidad;
            $articulo->a_refrigerado = $request->a_refrigerado;
            $articulo->vc_unidad = $request->vc_unidad;
            $articulo->a_margen_utilidad = $request->a_margen_utilidad;
            $articulo->a_aplica_desc = $request->a_aplica_desc;

            // Guardar los cambios en la base de datos
            $articulo->save();

            // Devolver una respuesta JSON indicando que el artículo ha sido editado exitosamente
            return response()->json(['message' => 'El articulo ha sido editado exitosamente', 'success' => true], 200);
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Manejar errores de validación y devolver una respuesta JSON con los mensajes de error
            return response()->json(['message' => 'Error de validación', 'errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            // Manejar otros errores y devolver una respuesta JSON con el mensaje de error
            return response()->json(['message' => 'Error al editar el artículo', 'error' => $e->getMessage()], 500);
        }
    }
}
