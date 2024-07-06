<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Detventum
 * 
 * @property int $vta_caja
 * @property int $vta_tran
 * @property string $vta_amecop
 * @property string|null $vta_det_status
 * @property int|null $vta_piezas
 * @property int|null $vta_piezas_dev
 * @property float|null $vta_precio
 * @property float|null $vta_importe
 * @property float|null $vta_priva
 * @property float|null $vta_iva
 * @property float|null $vta_importe_iva
 * @property float|null $vta_prdesc
 * @property float|null $vta_descuento
 * @property float|null $vta_total
 * @property int|null $vta_sucursal
 * @property float|null $vta_prieps
 * @property float|null $vta_ieps
 * @property float|null $vta_importe_ieps
 * @property float|null $vta_cprecio
 * @property float|null $vta_cimporte
 * @property float|null $vta_civa
 * @property float|null $vta_cimporte_iva
 * @property float|null $vta_cieps
 * @property float|null $vta_cimporte_ieps
 * @property float|null $vta_cdescuento
 * @property float|null $vta_ctotal
 * @property float|null $vta_subtotal
 * @property float|null $vta_csubtotal
 * @property int|null $vta_pieza_invo
 * @property int|null $vta_pieza_noinvo
 * @property Carbon|null $dt_upd
 * @property float|null $nu_base_iva
 * @property float|null $nu_base_ieps
 *
 * @package App\Models
 */
class Detventum extends Model
{
	protected $primaryKey = 'vta_amecop';
	protected $table = 'detventa';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'vta_caja' => 'int',
		'vta_tran' => 'int',
		'vta_piezas' => 'int',
		'vta_piezas_dev' => 'int',
		'vta_precio' => 'float',
		'vta_importe' => 'float',
		'vta_priva' => 'float',
		'vta_iva' => 'float',
		'vta_importe_iva' => 'float',
		'vta_prdesc' => 'float',
		'vta_descuento' => 'float',
		'vta_total' => 'float',
		'vta_sucursal' => 'int',
		'vta_prieps' => 'float',
		'vta_ieps' => 'float',
		'vta_importe_ieps' => 'float',
		'vta_cprecio' => 'float',
		'vta_cimporte' => 'float',
		'vta_civa' => 'float',
		'vta_cimporte_iva' => 'float',
		'vta_cieps' => 'float',
		'vta_cimporte_ieps' => 'float',
		'vta_cdescuento' => 'float',
		'vta_ctotal' => 'float',
		'vta_subtotal' => 'float',
		'vta_csubtotal' => 'float',
		'vta_pieza_invo' => 'int',
		'vta_pieza_noinvo' => 'int',
		'dt_upd' => 'datetime',
		'nu_base_iva' => 'float',
		'nu_base_ieps' => 'float'
	];

	protected $fillable = [
		'vta_det_status',
		'vta_piezas',
		'vta_piezas_dev',
		'vta_precio',
		'vta_importe',
		'vta_priva',
		'vta_iva',
		'vta_importe_iva',
		'vta_prdesc',
		'vta_descuento',
		'vta_total',
		'vta_sucursal',
		'vta_prieps',
		'vta_ieps',
		'vta_importe_ieps',
		'vta_cprecio',
		'vta_cimporte',
		'vta_civa',
		'vta_cimporte_iva',
		'vta_cieps',
		'vta_cimporte_ieps',
		'vta_cdescuento',
		'vta_ctotal',
		'vta_subtotal',
		'vta_csubtotal',
		'vta_pieza_invo',
		'vta_pieza_noinvo',
		'dt_upd',
		'nu_base_iva',
		'nu_base_ieps'
	];
}
