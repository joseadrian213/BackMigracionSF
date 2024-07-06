<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Articulo
 * 
 * @property string $a_amecop
 * @property string|null $a_nombre
 * @property string|null $a_laboratorio
 * @property string|null $a_clasificacion
 * @property string|null $a_local
 * @property string|null $a_sector
 * @property string|null $a_desc_nota
 * @property string|null $a_refrigerado
 * @property string|null $a_caducidad
 * @property string|null $a_clasificacion_ssa
 * @property string|null $a_tipo_cambio
 * @property int|null $a_cia
 * @property float|null $a_iva
 * @property float|null $a_ieps
 * @property float|null $a_publico
 * @property float|null $a_costo
 * @property float|null $a_costo_promedio
 * @property float|null $a_margen_utilidad
 * @property float|null $a_desc
 * @property float|null $a_comision
 * @property int|null $a_maximo
 * @property int|null $a_minimo
 * @property int|null $a_dias_inv
 * @property int|null $a_sucursal
 * @property float|null $a_costo_so
 * @property float|null $a_costo_sosdc
 * @property float|null $a_costo_sosdcsdn
 * @property float|null $a_costo_sosdcsdnsdcad
 * @property Carbon|null $a_fecha_mod
 * @property int|null $a_veces
 * @property float|null $a_margen_fijo
 * @property string|null $a_sustancia
 * @property int|null $a_grupo
 * @property string|null $vc_unidad
 * @property string|null $vc_producto
 * @property bool|null $bt_compra
 * @property int|null $a_aplica_desc
 * @property float|null $nu_gramaje
 * @property int|null $id_gramaje
 * @property int|null $id_gramaje_sb
 * @property int|null $id_gramaje_veh
 * @property int|null $id_presentacion
 * @property int|null $id_subpresentacion
 * @property string|null $vn_presentacion
 * @property string|null $vn_sustancia_large
 * @property string|null $vn_vehiculo
 * @property bool|null $bf_delete
 * @property bool|null $bf_antibiotico
 * @property int|null $id_fabricante
 * @property int|null $id_empaque
 * @property float|null $nu_cantidad_cad
 *
 * @package App\Models
 */
class Articulo extends Model
{
	protected $table = 'articulo';
	protected $primaryKey = 'a_amecop';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'a_cia' => 'int',
		'a_iva' => 'float',
		'a_ieps' => 'float',
		'a_publico' => 'float',
		'a_costo' => 'float',
		'a_costo_promedio' => 'float',
		'a_margen_utilidad' => 'float',
		'a_desc' => 'float',
		'a_comision' => 'float',
		'a_maximo' => 'int',
		'a_minimo' => 'int',
		'a_dias_inv' => 'int',
		'a_sucursal' => 'int',
		'a_costo_so' => 'float',
		'a_costo_sosdc' => 'float',
		'a_costo_sosdcsdn' => 'float',
		'a_costo_sosdcsdnsdcad' => 'float',
		'a_fecha_mod' => 'datetime',
		'a_veces' => 'int',
		'a_margen_fijo' => 'float',
		'a_grupo' => 'int',
		'bt_compra' => 'bool',
		'a_aplica_desc' => 'int',
		'nu_gramaje' => 'float',
		'id_gramaje' => 'int',
		'id_gramaje_sb' => 'int',
		'id_gramaje_veh' => 'int',
		'id_presentacion' => 'int',
		'id_subpresentacion' => 'int',
		'bf_delete' => 'bool',
		'bf_antibiotico' => 'bool',
		'id_fabricante' => 'int',
		'id_empaque' => 'int',
		'nu_cantidad_cad' => 'float'
	];

	protected $fillable = [
		'a_nombre',
		'a_laboratorio',
		'a_clasificacion',
		'a_local',
		'a_sector',
		'a_desc_nota',
		'a_refrigerado',
		'a_caducidad',
		'a_clasificacion_ssa',
		'a_tipo_cambio',
		'a_cia',
		'a_iva',
		'a_ieps',
		'a_publico',
		'a_costo',
		'a_costo_promedio',
		'a_margen_utilidad',
		'a_desc',
		'a_comision',
		'a_maximo',
		'a_minimo',
		'a_dias_inv',
		'a_sucursal',
		'a_costo_so',
		'a_costo_sosdc',
		'a_costo_sosdcsdn',
		'a_costo_sosdcsdnsdcad',
		'a_fecha_mod',
		'a_veces',
		'a_margen_fijo',
		'a_sustancia',
		'a_grupo',
		'vc_unidad',
		'vc_producto',
		'bt_compra',
		'a_aplica_desc',
		'nu_gramaje',
		'id_gramaje',
		'id_gramaje_sb',
		'id_gramaje_veh',
		'id_presentacion',
		'id_subpresentacion',
		'vn_presentacion',
		'vn_sustancia_large',
		'vn_vehiculo',
		'bf_delete',
		'bf_antibiotico',
		'id_fabricante',
		'id_empaque',
		'nu_cantidad_cad'
	];
	// public function sector(){
	// 	return $this->belongsTo(Sector::class,'a_sector','s_sector');//->withPivot('s_sector','s_nombre'); 
	
	// }
	// public function gramaje(){
	// 	return $this->belongsTo(Gramaje::class,'id_gramaje','id_gramaje');//->withPivot('vn_gramaje'); 
	// }
	// public function empaque(){
	// 	return $this->belongsTo(Empaque::class,'id_empaque','id_empaque');//->withPivot('vn_empaque'); 
														
	// }

	
}
