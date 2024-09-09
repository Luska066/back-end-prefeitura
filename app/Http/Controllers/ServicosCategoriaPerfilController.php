<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ServicosCategoriaPerfil;

class ServicosCategoriaPerfilController extends Controller {

    public function __construct() {

	}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, ) {

        $servicosCategoriaPerfils = ServicosCategoriaPerfil::query();

        if(!empty($request->search)) {
			$servicosCategoriaPerfils->where('nome', 'like', '%' . $request->search . '%');
		}

        $servicosCategoriaPerfils = $servicosCategoriaPerfils->paginate(10);

        return view('servicos_categoria_perfils.index', compact('servicosCategoriaPerfils'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {

        return view('servicos_categoria_perfils.create', []);
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

            $servicosCategoriaPerfil = new ServicosCategoriaPerfil();
            $servicosCategoriaPerfil->nome = $request->nome;
            $servicosCategoriaPerfil->save();

            return redirect()->route('servicos_categoria_perfil.index', [])->with('success', __('Servicos Categoria Perfil created successfully.'));
        } catch (\Throwable $e) {
            return redirect()->route('servicos_categoria_perfil.create', [])->withInput($request->input())->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\ServicosCategoriaPerfil $servicosCategoriaPerfil
     *
     * @return \Illuminate\Http\Response
     */
    public function show(ServicosCategoriaPerfil $servicosCategoriaPerfil,) {

        return view('servicos_categoria_perfils.show', compact('servicosCategoriaPerfil'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\ServicosCategoriaPerfil $servicosCategoriaPerfil
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(ServicosCategoriaPerfil $servicosCategoriaPerfil,) {

        return view('servicos_categoria_perfils.edit', compact('servicosCategoriaPerfil'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ServicosCategoriaPerfil $servicosCategoriaPerfil,) {

        $request->validate([]);

        try {
            $servicosCategoriaPerfil->nome = $request->nome;
            $servicosCategoriaPerfil->save();

            return redirect()->route('servicos_categoria_perfils.index', [])->with('success', __('Servicos Categoria Perfil edited successfully.'));
        } catch (\Throwable $e) {
            return redirect()->route('servicos_categoria_perfils.edit', compact('servicosCategoriaPerfil'))->withInput($request->input())->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\ServicosCategoriaPerfil $servicosCategoriaPerfil
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(ServicosCategoriaPerfil $servico_categoria_perfil,) {

        try {
            $servico_categoria_perfil->delete();

            return redirect()->route('servicos_categoria_perfil.index', [])->with('success', __('Servicos Categoria Perfil deleted successfully'));
        } catch (\Throwable $e) {
            return redirect()->route('servicos_categoria_perfil.index', [])->with('error', 'Cannot delete Servicos Categoria Perfil: ' . $e->getMessage());
        }
    }


}
