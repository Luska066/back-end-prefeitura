<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\CategoriaPortalTransparencium;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PortalTransparencium
 * 
 * @property int|null $id
 * @property string $titulo
 * @property int $id_categoria_portal_transparencia
 * @property string $redirect_uri
 * @property string $icon
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property CategoriaPortalTransparencium $categoria_portal_transparencium
 *
 * @package App\Models\Base
 */
class PortalTransparencium extends Model
{
	protected $table = 'portal_transparencia';

	protected $casts = [
		'id_categoria_portal_transparencia' => 'int'
	];

	protected $fillable = [
		'titulo',
		'id_categoria_portal_transparencia',
		'redirect_uri',
		'icon'
	];

	public function categoria_portal_transparencium()
	{
		return $this->belongsTo(CategoriaPortalTransparencium::class, 'id_categoria_portal_transparencia');
	}
}
