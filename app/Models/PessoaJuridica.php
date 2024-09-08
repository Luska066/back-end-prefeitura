<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PessoaJuridica extends Model {
    use HasFactory;

    protected $table = 'pessoa_juridica';
    protected $fillable = ["nome", "email", "horario", "endereco", "competencias"];

}
