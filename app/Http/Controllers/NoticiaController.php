<?php

namespace App\Http\Controllers;

use App\Models\Base\CategoriasNoticia;
use App\Models\Base\CategoriasNoticiaRelation;
use Illuminate\Http\Request;

use App\Models\Noticia;

class NoticiaController extends Controller {

    public function __construct() {
		$this->authorizeResource(Noticia::class, 'noticia');
	}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, ) {

        $noticias = Noticia::join('categorias_noticia_relations', 'noticias.id', '=', 'categorias_noticia_relations.id_noticia')
                        ->join('categorias_noticias', 'categorias_noticia_relations.id_categoria_noticia', '=', 'categorias_noticias.id')
                        ->select('noticias.*', 'categorias_noticias.nome as categoria_nome')
                        ->paginate(10);

        return view('noticias.index', compact('noticias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {

        $categorias = CategoriasNoticia::all();
        return view('noticias.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, ) {

        $request->validate([]);

        
        try {

            $noticia = Noticia::create($request->all());

            if ($request->has('categorias')) {
                foreach ($request->categorias as $categoriaId) {
                    CategoriasNoticiaRelation::create([
                        'id_categoria_noticia' => $categoriaId,
                        'id_noticia' => $noticia->id,
                    ]);
                }
            }

            $noticia = new Noticia();
            $noticia->titulo = $request->titulo;
		$noticia->image_url = $request->image_url;
		$noticia->conteudo = $request->conteudo;
            $noticia->save();

            return redirect()->route('noticias.index', [])->with('success', __('Noticia created successfully.'));
        } catch (\Throwable $e) {
            return redirect()->route('noticias.create', [])->withInput($request->input())->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Noticia $noticia
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Noticia $noticia,) {

        return view('noticias.show', compact('noticia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Noticia $noticia
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Noticia $noticia,) {

        $categorias = CategoriasNoticia::all();
        return view('noticias.edit', compact('noticia', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Noticia $noticia,) {

        $request->validate([]);

        try {

            $noticia->update($request->all());

            CategoriasNoticiaRelation::where('id_noticia', $noticia->id)->delete();
        
            if ($request->has('categorias')) {
                foreach ($request->categorias as $categoriaId) {
                    CategoriasNoticiaRelation::create([
                        'id_categoria_noticia' => $categoriaId,
                        'id_noticia' => $noticia->id,
                    ]);
                }
            }

            $noticia->titulo = $request->titulo;
		$noticia->image_url = $request->image_url;
		$noticia->conteudo = $request->conteudo;
            $noticia->save();

            return redirect()->route('noticias.index', [])->with('success', __('Noticia edited successfully.'));
        } catch (\Throwable $e) {
            return redirect()->route('noticias.edit', compact('noticia'))->withInput($request->input())->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Noticia $noticia
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Noticia $noticia,) {

        try {
            $noticia->delete();

            return redirect()->route('noticias.index', [])->with('success', __('Noticia deleted successfully'));
        } catch (\Throwable $e) {
            return redirect()->route('noticias.index', [])->with('error', 'Cannot delete Noticia: ' . $e->getMessage());
        }
    }
    
}
