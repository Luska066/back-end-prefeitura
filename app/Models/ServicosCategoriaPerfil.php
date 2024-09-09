<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ServicosCategoriaPerfil extends Model {
    use HasFactory;

    protected $table = 'servicos_categoria_perfil';
    protected $fillable = ["nome"];

}
