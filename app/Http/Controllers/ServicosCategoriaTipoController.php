<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ServicosCategoriaTipo;

class ServicosCategoriaTipoController extends Controller {

    public function __construct() {
//		$this->authorizeResource(ServicosCategoriaTipo::class, 'servicosCategoriaTipo');
	}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, ) {

        $servicosCategoriaTipos = ServicosCategoriaTipo::query();

        if(!empty($request->search)) {
			$servicosCategoriaTipos->where('nome', 'like', '%' . $request->search . '%');
		}

        $servicosCategoriaTipos = $servicosCategoriaTipos->paginate(10);

        return view('servicos_categoria_tipos.index', compact('servicosCategoriaTipos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {

        return view('servicos_categoria_tipos.create', []);
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

            $servicosCategoriaTipo = new ServicosCategoriaTipo();
            $servicosCategoriaTipo->nome = $request->nome;
            $servicosCategoriaTipo->save();

            return redirect()->route('servicos_categoria_tipo.index', [])->with('success', __('Servicos Categoria Tipo created successfully.'));
        } catch (\Throwable $e) {
            return redirect()->route('servicos_categoria_tipo.create', [])->withInput($request->input())->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\ServicosCategoriaTipo $servicosCategoriaTipo
     *
     * @return \Illuminate\Http\Response
     */
    public function show(ServicosCategoriaTipo $servicosCategoriaTipo,) {

        return view('servicos_categoria_tipos.show', compact('servicosCategoriaTipo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\ServicosCategoriaTipo $servicosCategoriaTipo
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(ServicosCategoriaTipo $servicosCategoriaTipo,) {

        return view('servicos_categoria_tipos.edit', compact('servicosCategoriaTipo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ServicosCategoriaTipo $servicosCategoriaTipo,) {

        $request->validate([]);

        try {
            $servicosCategoriaTipo->nome = $request->nome;
            $servicosCategoriaTipo->save();

            return redirect()->route('servicos_categoria_tipo.index', [])->with('success', __('Servicos Categoria Tipo edited successfully.'));
        } catch (\Throwable $e) {
            return redirect()->route('servicos_categoria_tipo.edit', compact('servicosCategoriaTipo'))->withInput($request->input())->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\ServicosCategoriaTipo $servicosCategoriaTipo
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(ServicosCategoriaTipo $servicosCategoriaTipo,) {

        try {
            $servicosCategoriaTipo->delete();

            return redirect()->route('servicos_categoria_tipo.index', [])->with('success', __('Servicos Categoria Tipo deleted successfully'));
        } catch (\Throwable $e) {
            return redirect()->route('servicos_categoria_tipo.index', [])->with('error', 'Cannot delete Servicos Categoria Tipo: ' . $e->getMessage());
        }
    }


}
