<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Acumuladoarticulo
 * 
 * @property string $a_amecop
 * @property int|null $a_existencia
 * @property int|null $a_existencia_inicial
 * @property float|null $a_incremento
 * @property float|null $a_pdv
 * @property Carbon|null $a_fecha_modificacion
 * @property Carbon|null $a_fecha_ingreso
 * @property Carbon|null $a_fecha_precio
 * @property Carbon|null $a_fecha_venta
 * @property Carbon|null $a_fecha_compra
 * @property Carbon|null $a_fecha_devolucion
 * @property Carbon|null $a_fecha_inventario
 * @property float|null $a_vta_importe
 * @property float|null $a_vta_importe_a
 * @property float|null $a_vta_iva
 * @property float|null $a_vta_iva_a
 * @property float|null $a_vta_importe_iva
 * @property float|null $a_vta_importe_iva_a
 * @property float|null $a_vta_descuento
 * @property float|null $a_vta_descuento_a
 * @property float|null $a_vta_total
 * @property float|null $a_vta_total_a
 * @property int|null $a_vta_dia
 * @property int|null $a_vta_dia_a
 * @property int|null $a_vta_mes
 * @property int|null $a_vta_mes_a
 * @property int|null $a_vta_anio
 * @property int|null $a_vta_anio_a
 * @property float|null $a_vta_pes_dia
 * @property float|null $a_vta_pes_dia_a
 * @property float|null $a_vta_pes_mes
 * @property float|null $a_vta_pes_mes_a
 * @property float|null $a_vta_pes_anio
 * @property float|null $a_vta_pes_anio_a
 * @property int|null $a_com_dia
 * @property int|null $a_com_dia_a
 * @property int|null $a_com_mes
 * @property int|null $a_com_mes_a
 * @property int|null $a_com_anio
 * @property int|null $a_com_anio_a
 * @property float|null $a_com_pes_dia
 * @property float|null $a_com_pes_dia_a
 * @property float|null $a_com_pes_mes
 * @property float|null $a_com_pes_mes_a
 * @property float|null $a_com_pes_anio
 * @property float|null $a_com_pes_anio_a
 * @property int|null $a_dev_dia
 * @property int|null $a_dev_dia_a
 * @property int|null $a_dev_mes
 * @property int|null $a_dev_mes_a
 * @property int|null $a_dev_anio
 * @property int|null $a_dev_anio_a
 * @property float|null $a_dev_pes_dia
 * @property float|null $a_dev_pes_dia_a
 * @property float|null $a_dev_pes_mes
 * @property float|null $a_dev_pes_mes_a
 * @property float|null $a_dev_pes_anio
 * @property float|null $a_dev_pes_anio_a
 * @property int|null $a_mer_dia
 * @property int|null $a_mer_dia_a
 * @property int|null $a_mer_mes
 * @property int|null $a_mer_mes_a
 * @property int|null $a_mer_anio
 * @property int|null $a_mer_anio_a
 * @property float|null $a_mer_pes_dia
 * @property float|null $a_mer_pes_dia_a
 * @property float|null $a_mer_pes_mes
 * @property float|null $a_mer_pes_mes_a
 * @property float|null $a_mer_pes_anio
 * @property float|null $a_mer_pes_anio_a
 * @property int|null $a_tra_dia
 * @property int|null $a_tra_dia_a
 * @property int|null $a_tra_mes
 * @property int|null $a_tra_mes_a
 * @property int|null $a_tra_anio
 * @property int|null $a_tra_anio_a
 * @property float|null $a_tra_pes_dia
 * @property float|null $a_tra_pes_dia_a
 * @property float|null $a_tra_pes_mes
 * @property float|null $a_tra_pes_mes_a
 * @property float|null $a_tra_pes_anio
 * @property float|null $a_tra_pes_anio_a
 * @property int|null $a_aju_dia
 * @property int|null $a_aju_dia_a
 * @property int|null $a_aju_mes
 * @property int|null $a_aju_mes_a
 * @property int|null $a_aju_anio
 * @property int|null $a_aju_anio_a
 * @property float|null $a_aju_pes_dia
 * @property float|null $a_aju_pes_dia_a
 * @property float|null $a_aju_pes_mes
 * @property float|null $a_aju_pes_mes_a
 * @property float|null $a_aju_pes_anio
 * @property float|null $a_aju_pes_anio_a
 * @property float|null $a_ultimo_costo
 * @property int|null $a_puc
 * @property int|null $a_puc_a
 *
 * @package App\Models
 */
class Acumuladoarticulo extends Model
{
	protected $table = 'acumuladoarticulo';
	protected $primaryKey = 'a_amecop';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'a_existencia' => 'int',
		'a_existencia_inicial' => 'int',
		'a_incremento' => 'float',
		'a_pdv' => 'float',
		'a_fecha_modificacion' => 'datetime',
		'a_fecha_ingreso' => 'datetime',
		'a_fecha_precio' => 'datetime',
		'a_fecha_venta' => 'datetime',
		'a_fecha_compra' => 'datetime',
		'a_fecha_devolucion' => 'datetime',
		'a_fecha_inventario' => 'datetime',
		'a_vta_importe' => 'float',
		'a_vta_importe_a' => 'float',
		'a_vta_iva' => 'float',
		'a_vta_iva_a' => 'float',
		'a_vta_importe_iva' => 'float',
		'a_vta_importe_iva_a' => 'float',
		'a_vta_descuento' => 'float',
		'a_vta_descuento_a' => 'float',
		'a_vta_total' => 'float',
		'a_vta_total_a' => 'float',
		'a_vta_dia' => 'int',
		'a_vta_dia_a' => 'int',
		'a_vta_mes' => 'int',
		'a_vta_mes_a' => 'int',
		'a_vta_anio' => 'int',
		'a_vta_anio_a' => 'int',
		'a_vta_pes_dia' => 'float',
		'a_vta_pes_dia_a' => 'float',
		'a_vta_pes_mes' => 'float',
		'a_vta_pes_mes_a' => 'float',
		'a_vta_pes_anio' => 'float',
		'a_vta_pes_anio_a' => 'float',
		'a_com_dia' => 'int',
		'a_com_dia_a' => 'int',
		'a_com_mes' => 'int',
		'a_com_mes_a' => 'int',
		'a_com_anio' => 'int',
		'a_com_anio_a' => 'int',
		'a_com_pes_dia' => 'float',
		'a_com_pes_dia_a' => 'float',
		'a_com_pes_mes' => 'float',
		'a_com_pes_mes_a' => 'float',
		'a_com_pes_anio' => 'float',
		'a_com_pes_anio_a' => 'float',
		'a_dev_dia' => 'int',
		'a_dev_dia_a' => 'int',
		'a_dev_mes' => 'int',
		'a_dev_mes_a' => 'int',
		'a_dev_anio' => 'int',
		'a_dev_anio_a' => 'int',
		'a_dev_pes_dia' => 'float',
		'a_dev_pes_dia_a' => 'float',
		'a_dev_pes_mes' => 'float',
		'a_dev_pes_mes_a' => 'float',
		'a_dev_pes_anio' => 'float',
		'a_dev_pes_anio_a' => 'float',
		'a_mer_dia' => 'int',
		'a_mer_dia_a' => 'int',
		'a_mer_mes' => 'int',
		'a_mer_mes_a' => 'int',
		'a_mer_anio' => 'int',
		'a_mer_anio_a' => 'int',
		'a_mer_pes_dia' => 'float',
		'a_mer_pes_dia_a' => 'float',
		'a_mer_pes_mes' => 'float',
		'a_mer_pes_mes_a' => 'float',
		'a_mer_pes_anio' => 'float',
		'a_mer_pes_anio_a' => 'float',
		'a_tra_dia' => 'int',
		'a_tra_dia_a' => 'int',
		'a_tra_mes' => 'int',
		'a_tra_mes_a' => 'int',
		'a_tra_anio' => 'int',
		'a_tra_anio_a' => 'int',
		'a_tra_pes_dia' => 'float',
		'a_tra_pes_dia_a' => 'float',
		'a_tra_pes_mes' => 'float',
		'a_tra_pes_mes_a' => 'float',
		'a_tra_pes_anio' => 'float',
		'a_tra_pes_anio_a' => 'float',
		'a_aju_dia' => 'int',
		'a_aju_dia_a' => 'int',
		'a_aju_mes' => 'int',
		'a_aju_mes_a' => 'int',
		'a_aju_anio' => 'int',
		'a_aju_anio_a' => 'int',
		'a_aju_pes_dia' => 'float',
		'a_aju_pes_dia_a' => 'float',
		'a_aju_pes_mes' => 'float',
		'a_aju_pes_mes_a' => 'float',
		'a_aju_pes_anio' => 'float',
		'a_aju_pes_anio_a' => 'float',
		'a_ultimo_costo' => 'float',
		'a_puc' => 'int',
		'a_puc_a' => 'int'
	];

	protected $fillable = [
		'a_existencia',
		'a_existencia_inicial',
		'a_incremento',
		'a_pdv',
		'a_fecha_modificacion',
		'a_fecha_ingreso',
		'a_fecha_precio',
		'a_fecha_venta',
		'a_fecha_compra',
		'a_fecha_devolucion',
		'a_fecha_inventario',
		'a_vta_importe',
		'a_vta_importe_a',
		'a_vta_iva',
		'a_vta_iva_a',
		'a_vta_importe_iva',
		'a_vta_importe_iva_a',
		'a_vta_descuento',
		'a_vta_descuento_a',
		'a_vta_total',
		'a_vta_total_a',
		'a_vta_dia',
		'a_vta_dia_a',
		'a_vta_mes',
		'a_vta_mes_a',
		'a_vta_anio',
		'a_vta_anio_a',
		'a_vta_pes_dia',
		'a_vta_pes_dia_a',
		'a_vta_pes_mes',
		'a_vta_pes_mes_a',
		'a_vta_pes_anio',
		'a_vta_pes_anio_a',
		'a_com_dia',
		'a_com_dia_a',
		'a_com_mes',
		'a_com_mes_a',
		'a_com_anio',
		'a_com_anio_a',
		'a_com_pes_dia',
		'a_com_pes_dia_a',
		'a_com_pes_mes',
		'a_com_pes_mes_a',
		'a_com_pes_anio',
		'a_com_pes_anio_a',
		'a_dev_dia',
		'a_dev_dia_a',
		'a_dev_mes',
		'a_dev_mes_a',
		'a_dev_anio',
		'a_dev_anio_a',
		'a_dev_pes_dia',
		'a_dev_pes_dia_a',
		'a_dev_pes_mes',
		'a_dev_pes_mes_a',
		'a_dev_pes_anio',
		'a_dev_pes_anio_a',
		'a_mer_dia',
		'a_mer_dia_a',
		'a_mer_mes',
		'a_mer_mes_a',
		'a_mer_anio',
		'a_mer_anio_a',
		'a_mer_pes_dia',
		'a_mer_pes_dia_a',
		'a_mer_pes_mes',
		'a_mer_pes_mes_a',
		'a_mer_pes_anio',
		'a_mer_pes_anio_a',
		'a_tra_dia',
		'a_tra_dia_a',
		'a_tra_mes',
		'a_tra_mes_a',
		'a_tra_anio',
		'a_tra_anio_a',
		'a_tra_pes_dia',
		'a_tra_pes_dia_a',
		'a_tra_pes_mes',
		'a_tra_pes_mes_a',
		'a_tra_pes_anio',
		'a_tra_pes_anio_a',
		'a_aju_dia',
		'a_aju_dia_a',
		'a_aju_mes',
		'a_aju_mes_a',
		'a_aju_anio',
		'a_aju_anio_a',
		'a_aju_pes_dia',
		'a_aju_pes_dia_a',
		'a_aju_pes_mes',
		'a_aju_pes_mes_a',
		'a_aju_pes_anio',
		'a_aju_pes_anio_a',
		'a_ultimo_costo',
		'a_puc',
		'a_puc_a'
	];
}
