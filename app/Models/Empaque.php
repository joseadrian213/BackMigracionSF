<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Empaque
 * 
 * @property int $id_empaque
 * @property int $id_tipo
 * @property string|null $vc_empaque
 * @property string|null $vn_empaque
 * @property int|null $nu_order
 * @property string|null $vs_status
 * @property bool|null $bf_delete
 * @property int|null $id_user_upd
 * @property Carbon|null $dt_upd
 *
 * @package App\Models
 */
class Empaque extends Model
{
	protected $table = 'empaque';
	protected $primaryKey = 'id_empaque';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_empaque' => 'int',
		'id_tipo' => 'int',
		'nu_order' => 'int',
		'bf_delete' => 'bool',
		'id_user_upd' => 'int',
		'dt_upd' => 'datetime'
	];

	protected $fillable = [
		'id_tipo',
		'vc_empaque',
		'vn_empaque',
		'nu_order',
		'vs_status',
		'bf_delete',
		'id_user_upd',
		'dt_upd'
	];
}
