<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Gramaje
 * 
 * @property int $id_gramaje
 * @property int $id_tipo
 * @property string|null $vc_gramaje
 * @property string|null $vn_gramaje
 * @property string|null $vs_status
 * @property bool|null $bf_delete
 * @property int|null $id_user_upd
 * @property Carbon|null $dt_upd
 * @property int|null $nu_order
 *
 * @package App\Models
 */
class Gramaje extends Model
{
	protected $table = 'gramaje';
	protected $primaryKey = 'id_gramaje';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_gramaje' => 'int',
		'id_tipo' => 'int',
		'bf_delete' => 'bool',
		'id_user_upd' => 'int',
		'dt_upd' => 'datetime',
		'nu_order' => 'int'
	];

	protected $fillable = [
		'id_tipo',
		'vc_gramaje',
		'vn_gramaje',
		'vs_status',
		'bf_delete',
		'id_user_upd',
		'dt_upd',
		'nu_order'
	];
}
