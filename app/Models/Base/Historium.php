<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Historium
 * 
 * @property int|null $id
 * @property string|null $title
 * @property string|null $fundacao
 * @property string|null $aniversario
 * @property string|null $gentilico
 * @property string|null $populacao
 * @property string|null $area
 * @property string|null $content
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @package App\Models\Base
 */
class Historium extends Model
{
	protected $table = 'historia';

	protected $fillable = [
		'title',
		'fundacao',
		'aniversario',
		'gentilico',
		'populacao',
		'area',
		'content'
	];
}
