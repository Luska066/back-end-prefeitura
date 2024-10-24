<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Noticia;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class NoticiasDocumento
 * 
 * @property int|null $id
 * @property string $nome_documento
 * @property string $documento_url
 * @property int $id_noticia
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Noticia $noticia
 *
 * @package App\Models\Base
 */
class NoticiasDocumento extends Model
{
	protected $table = 'noticias_documentos';

	protected $casts = [
		'id_noticia' => 'int'
	];

	protected $fillable = [
		'nome_documento',
		'documento_url',
		'id_noticia'
	];

	public function noticia()
	{
		return $this->belongsTo(Noticia::class, 'id_noticia');
	}
}
