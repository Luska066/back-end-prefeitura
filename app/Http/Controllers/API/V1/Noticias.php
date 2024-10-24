<?php

namespace App\Http\Controllers\API\V1;

use App\Models\Base\CategoriasNoticia;
use App\Models\Base\Noticia;
use Illuminate\Http\Request;

class Noticias
{
    public function getAll(Request $request)
    {
        // if (($request->query('perfil') && $request->query('categoria')) != null) {
        //     $id_categoria_categoria = ServicosCategoriaTipo::where('nome',$request->query('categoria'))->first()->id;
        //     $id_categoria_perfil = ServicosCategoriaPerfil::where('nome',$request->query('perfil'))->first()->id;
        //     return Servico::with([
        //         'servicos_categoria_tipo',
        //         'servicos_categoria_perfil'
        //     ])
        //         ->where('id_categoria_tipo',$id_categoria_categoria)
        //         ->where('id_categoria_perfil',$id_categoria_perfil)
        //         ->paginate(1);
        // }

        // if ($request->query('perfil') != null) {
        //     $id_categoria_perfil = ServicosCategoriaPerfil::where('nome',$request->query('perfil'))->first()->id;
        //     return Servico::with([
        //         'servicos_categoria_tipo',
        //         'servicos_categoria_perfil'
        //     ])
        //         ->where('id_categoria_perfil',$id_categoria_perfil)
        //         ->paginate(1);
        // }

        // if ($request->query('categoria') != null) {
        //     $id_categoria_categoria = ServicosCategoriaTipo::where('nome',$request->query('categoria'))->first()->id;
        //     return Servico::with([
        //         'servicos_categoria_tipo',
        //         'servicos_categoria_perfil'
        //     ])
        //         ->where('id_categoria_tipo',$id_categoria_categoria)
        //         ->paginate(1);
        // }
        // return Servico::with([
        //     'servicos_categoria_tipo',
        //     'servicos_categoria_perfil'
        // ])->paginate(1);
    }

    public function getFiltersCategorias(Request $request)
    {
        return [
            "categoria" => CategoriasNoticia::all()
        ];
    }

    public function firstNoticias(Request $request)
    {
        $noticias = Noticia::paginate(10); 
    
        return [
            "categoria" => $noticias
        ];
    }

    public function uuidNoticia(Request $request)
    {
        
    
        return [
            
        ];
    }

    public function tituloNoticia(Request $request)
    {
        
        $title = trim($request->query('titulo'));
        \Log::info("Titulo recebido na API: " . $title);
        \Log::info('Teste de log simples para verificar se está sendo gravado.');
    
        $noticias = Noticia::where('titulo', $title)->paginate(10);
        dd($noticias);
    
        \Log::info("Noticias encontradas: " . $noticias->count());
    
        return response()->json([
            'noticias' => $noticias->items(),
            'current_page' => $noticias->currentPage(),
            'total_pages' => $noticias->lastPage(),
            'total_items' => $noticias->total(),
            'next_page_url' => $noticias->nextPageUrl(),
            'prev_page_url' => $noticias->previousPageUrl(),
        ]);
    }
}