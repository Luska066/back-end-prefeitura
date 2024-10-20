<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CargosPessoaJuridica
 * 
 * @property int|null $id
 * @property string|null $nome
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @package App\Models\Base
 */
class CargosPessoaJuridica extends Model
{
	protected $table = 'cargos_pessoa_juridica';

	protected $fillable = [
		'nome'
	];
}
