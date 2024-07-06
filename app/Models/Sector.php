<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Sector
 * 
 * @property string $s_sector
 * @property string|null $s_nombre
 *
 * @package App\Models
 */
class Sector extends Model
{
	protected $table = 'sector';
	protected $primaryKey = 's_sector';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		's_nombre'
	];
}
