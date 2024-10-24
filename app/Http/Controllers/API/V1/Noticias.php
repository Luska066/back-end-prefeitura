<?php

namespace App\Http\Controllers\API\V1;

use App\Models\Base\CategoriasNoticia;
use App\Models\Base\Noticia;
use App\Services\FileService;
use Illuminate\Http\Request;

class Noticias
{

    public function getFiltersCategorias(Request $request)
    {
        return CategoriasNoticia::all();
    }

    public function firstNoticias(Request $request)
    {
        if(!empty($request->query('titulo'))){
            return Noticia::where('titulo',$request->query('titulo'))->paginate(10);
        }
        return Noticia::paginate(10);
    }

    public function uuidNoticia(Request $request)
    {


        return [

        ];
    }

}
