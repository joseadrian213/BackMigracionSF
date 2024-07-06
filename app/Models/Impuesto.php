<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Impuesto
 * 
 * @property int $id_impuesto
 * @property string $vc_impuesto
 * @property string|null $vn_impuesto
 * @property bool|null $bf_retencion
 * @property bool|null $bf_traslado
 * @property string|null $vn_tipo
 * @property string|null $vn_entidad
 * @property int|null $id_user_add
 * @property Carbon|null $dt_add
 * @property int|null $id_user_upd
 * @property Carbon|null $dt_upd
 *
 * @package App\Models
 */
class Impuesto extends Model
{
	protected $table = 'impuesto';
	protected $primaryKey = 'id_impuesto';
	public $timestamps = false;

	protected $casts = [
		'bf_retencion' => 'bool',
		'bf_traslado' => 'bool',
		'id_user_add' => 'int',
		'dt_add' => 'datetime',
		'id_user_upd' => 'int',
		'dt_upd' => 'datetime'
	];

	protected $fillable = [
		'vc_impuesto',
		'vn_impuesto',
		'bf_retencion',
		'bf_traslado',
		'vn_tipo',
		'vn_entidad',
		'id_user_add',
		'dt_add',
		'id_user_upd',
		'dt_upd'
	];
}
