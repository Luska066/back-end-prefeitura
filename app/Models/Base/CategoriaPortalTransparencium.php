<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CategoriaPortalTransparencium
 * 
 * @property int|null $id
 * @property string|null $nome
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @package App\Models\Base
 */
class CategoriaPortalTransparencium extends Model
{
	protected $table = 'categoria_portal_transparencia';

	protected $fillable = [
		'nome'
	];
}
