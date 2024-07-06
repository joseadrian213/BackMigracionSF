<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Tasacuotum
 * 
 * @property int $id_tc
 * @property int $id_impuesto
 * @property int $id_tipofactor
 * @property string|null $vn_tc
 * @property float|null $nu_minimo
 * @property float|null $nu_maximo
 * @property bool|null $bf_retencion
 * @property bool|null $bf_traslado
 * @property Carbon|null $dt_inicio_vigencia
 * @property Carbon|null $dt_fin_vigencia
 * @property int|null $id_user_add
 * @property Carbon|null $dt_add
 * @property int|null $id_user_upd
 * @property Carbon|null $dt_upd
 * @property bool|null $bf_default
 * @property float|null $nu_tasa
 * @property bool|null $bf_current
 *
 * @package App\Models
 */
class Tasacuotum extends Model
{
	protected $table = 'tasacuota';
	protected $primaryKey = 'id_tc';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_tc' => 'int',
		'id_impuesto' => 'int',
		'id_tipofactor' => 'int',
		'nu_minimo' => 'float',
		'nu_maximo' => 'float',
		'bf_retencion' => 'bool',
		'bf_traslado' => 'bool',
		'dt_inicio_vigencia' => 'datetime',
		'dt_fin_vigencia' => 'datetime',
		'id_user_add' => 'int',
		'dt_add' => 'datetime',
		'id_user_upd' => 'int',
		'dt_upd' => 'datetime',
		'bf_default' => 'bool',
		'nu_tasa' => 'float',
		'bf_current' => 'bool'
	];

	protected $fillable = [
		'id_impuesto',
		'id_tipofactor',
		'vn_tc',
		'nu_minimo',
		'nu_maximo',
		'bf_retencion',
		'bf_traslado',
		'dt_inicio_vigencia',
		'dt_fin_vigencia',
		'id_user_add',
		'dt_add',
		'id_user_upd',
		'dt_upd',
		'bf_default',
		'nu_tasa',
		'bf_current'
	];
}
