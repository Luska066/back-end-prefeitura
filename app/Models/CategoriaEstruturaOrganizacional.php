<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CategoriaEstruturaOrganizacional extends Model {
    use HasFactory;

    protected $table = 'categoria_estrutura_organizacional';
    protected $fillable = ["nome"];

}
