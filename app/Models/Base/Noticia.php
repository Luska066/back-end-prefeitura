<?php

/**
 * Created by Reliese Model.
 */

 namespace App\Models\Base;

 use Carbon\Carbon;
 use Illuminate\Database\Eloquent\Model;
 use Illuminate\Support\Str;
 
 class Noticia extends Model
 {
     protected $table = 'noticias';
 
     protected $fillable = [
         'titulo',
         'image_url',
         'conteudo',
         'uuid'
     ];
 
     protected static function boot()
     {
         parent::boot();
 
         static::creating(function ($model) {
             if (empty($model->uuid)) {
                 $model->uuid = (string) Str::uuid(); // Gera o UUID e o atribui ao campo 'uuid'
             }
         });
     }
 
     // Definindo a relação com Categorias usando a tabela auxiliar
     public function categorias()
     {
         return $this->belongsToMany(
             CategoriasNoticia::class,
             'categorias_noticia_relations',
             'id_noticia',
             'id_categoria_noticia'
         );
     }
 }
 

