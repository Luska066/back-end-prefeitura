<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\CategoriaEstruturaOrganizacional;
use App\Models\PessoaJuridica;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Estrutura
 *
 * @property int|null $id
 * @property int $id_categoria
 * @property int $id_pessoa_juridica
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property CategoriaEstruturaOrganizacional $categoria_estrutura_organizacional
 * @property PessoaJuridica $pessoa_juridica
 *
 * @package App\Models\Base
 */
class Estrutura extends Model
{
	protected $table = 'estrutura';

	protected $casts = [
		'id_categoria' => 'int',
		'id_pessoa_juridica' => 'int'
	];

	protected $fillable = [
        'title',
		'id_categoria',
		'id_pessoa_juridica'
	];

	public function categoria_estrutura_organizacional()
	{
		return $this->belongsTo(CategoriaEstruturaOrganizacional::class, 'id_categoria');
	}

	public function pessoa_juridica()
	{
		return $this->belongsTo(PessoaJuridica::class, 'id_pessoa_juridica');
	}
}
