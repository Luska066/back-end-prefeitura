<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\CategoriasNoticia;

class CategoriasNoticiasController extends Controller {

    public function __construct() {
		// $this->authorizeResource(CategoriasNoticia::class, 'categoriasNoticia');
	}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, ) {

        $categoriasNoticias = CategoriasNoticia::query();

        if(!empty($request->search)) {
			$categoriasNoticias->where('nome', 'like', '%' . $request->search . '%');
		}

        $categoriasNoticias = $categoriasNoticias->paginate(10);

        return view('categorias_noticias.index', compact('categoriasNoticias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {

        return view('categorias_noticias.create', []);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, ) {

        $request->validate(["nome" => "required"]);

        try {

            $categoriasNoticia = new CategoriasNoticia();
            $categoriasNoticia->nome = $request->nome;
            $categoriasNoticia->save();

            return redirect()->route('categorias_noticias.index', [])->with('success', __('Categorias Noticia created successfully.'));
        } catch (\Throwable $e) {
            return redirect()->route('categorias_noticias.create', [])->withInput($request->input())->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\CategoriasNoticia $categoriasNoticia
     *
     * @return \Illuminate\Http\Response
     */
    public function show(CategoriasNoticia $categoriasNoticia,) {

        return view('categorias_noticias.show', compact('categoriasNoticia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\CategoriasNoticia $categoriasNoticia
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoriasNoticia $categoriasNoticia,) {

        return view('categorias_noticias.edit', compact('categoriasNoticia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategoriasNoticia $categoriasNoticia,) {

        $request->validate(["nome" => "required"]);

        try {
            $categoriasNoticia->nome = $request->nome;
            $categoriasNoticia->save();

            return redirect()->route('categorias_noticias.index', [])->with('success', __('Categorias Noticia edited successfully.'));
        } catch (\Throwable $e) {
            return redirect()->route('categorias_noticias.edit', compact('categoriasNoticia'))->withInput($request->input())->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\CategoriasNoticia $categoriasNoticia
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoriasNoticia $categoriasNoticia,) {

        try {
            $categoriasNoticia->delete();

            return redirect()->route('categorias_noticias.index', [])->with('success', __('Categorias Noticia deleted successfully'));
        } catch (\Throwable $e) {
            return redirect()->route('categorias_noticias.index', [])->with('error', 'Cannot delete Categorias Noticia: ' . $e->getMessage());
        }
    }

    
}
