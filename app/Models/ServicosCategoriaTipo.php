<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ServicosCategoriaTipo extends Model {
    use HasFactory;

    protected $table = 'servicos_categoria_tipo';
    protected $fillable = ["nome"];

}
