<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Articuloimpuesto
 * 
 * @property string $a_amecop
 * @property int $id_impuesto
 * @property int $id_tc
 * @property string $vc_impuesto
 * @property int|null $id_user_add
 * @property Carbon|null $dt_add
 * @property int|null $id_user_upd
 * @property Carbon|null $dt_upd
 *
 * @package App\Models
 */
class Articuloimpuesto extends Model
{
	protected $table = 'articuloimpuesto';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_impuesto' => 'int',
		'id_tc' => 'int',
		'id_user_add' => 'int',
		'dt_add' => 'datetime',
		'id_user_upd' => 'int',
		'dt_upd' => 'datetime'
	];

	protected $fillable = [
		'id_tc',
		'vc_impuesto',
		'id_user_add',
		'dt_add',
		'id_user_upd',
		'dt_upd'
	];
}
