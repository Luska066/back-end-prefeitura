<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\ServicosCategoriaPerfil;
use App\Models\ServicosCategoriaTipo;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Servico
 * 
 * @property int|null $id
 * @property int $id_categoria_perfil
 * @property int $id_categoria_tipo
 * @property string $titulo
 * @property string $descricao
 * @property string $redirect_uri
 * @property string $icon
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property ServicosCategoriaPerfil $servicos_categoria_perfil
 * @property ServicosCategoriaTipo $servicos_categoria_tipo
 *
 * @package App\Models\Base
 */
class Servico extends Model
{
	protected $table = 'servicos';

	protected $casts = [
		'id_categoria_perfil' => 'int',
		'id_categoria_tipo' => 'int'
	];

	protected $fillable = [
		'id_categoria_perfil',
		'id_categoria_tipo',
		'titulo',
		'descricao',
		'redirect_uri',
		'icon'
	];

	public function servicos_categoria_perfil()
	{
		return $this->belongsTo(ServicosCategoriaPerfil::class, 'id_categoria_perfil');
	}

	public function servicos_categoria_tipo()
	{
		return $this->belongsTo(ServicosCategoriaTipo::class, 'id_categoria_tipo');
	}
}
