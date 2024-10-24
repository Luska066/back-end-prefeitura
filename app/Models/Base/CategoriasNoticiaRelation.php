<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\CategoriasNoticia;
use App\Models\Noticia;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CategoriasNoticiaRelation
 * 
 * @property int|null $id
 * @property int $id_categoria_noticia
 * @property int $id_noticia
 * 
 * @property CategoriasNoticia $categorias_noticia
 * @property Noticia $noticia
 *
 * @package App\Models\Base
 */
class CategoriasNoticiaRelation extends Model
{
	protected $table = 'categorias_noticia_relations';
	public $timestamps = false;

	protected $casts = [
		'id_categoria_noticia' => 'int',
		'id_noticia' => 'int'
	];

	protected $fillable = [
		'id_categoria_noticia',
		'id_noticia'
	];

	public function categorias_noticia()
	{
		return $this->belongsTo(CategoriasNoticia::class, 'id_categoria_noticia');
	}

	public function noticia()
	{
		return $this->belongsTo(Noticia::class, 'id_noticia');
	}
}
