<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PessoaJuridica
 *
 * @property int|null $id
 * @property string $nome
 * @property string $email
 * @property string $horario
 * @property string $endereco
 * @property string $competencias
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property int $id_cargo
 *
 * @package App\Models\Base
 */
class PessoaJuridica extends Model
{
	protected $table = 'pessoa_juridica';

	protected $casts = [
		'id_cargo' => 'int'
	];

	protected $fillable = [
		'nome',
		'email',
		'horario',
		'endereco',
		'competencias',
		'id_cargo'
	];

    public function cargo(){
        return $this->belongsTo(\App\Models\CargosPessoaJuridica::class, 'id_cargo');
    }
}
