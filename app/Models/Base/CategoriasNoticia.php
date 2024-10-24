<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CategoriasNoticia
 * 
 * @property int|null $id
 * @property string|null $nome
 *
 * @package App\Models\Base
 */
class CategoriasNoticia extends Model
{
	protected $table = 'categorias_noticias';
	public $timestamps = false;

	protected $fillable = [
		'nome'
	];
}
