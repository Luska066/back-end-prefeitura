<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Servico;

class ServicoController extends Controller {

    public function __construct() {
		$this->authorizeResource(Servico::class, 'servico');
	}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, ) {

        $servicos = Servico::query();

        if(!empty($request->search)) {
			$servicos->where('titulo', 'like', '%' . $request->search . '%');
		}

        $servicos = $servicos->paginate(10);

        return view('servicos.index', compact('servicos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {

        return view('servicos.create', []);
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

            $servico = new Servico();
            $servico->id_categoria_perfil = $request->id_categoria_perfil;
		$servico->id_categoria_tipo = $request->id_categoria_tipo;
		$servico->titulo = $request->titulo;
		$servico->descricao = $request->descricao;
		$servico->redirect_uri = $request->redirect_uri;
		$servico->icon = $request->icon;
            $servico->save();

            return redirect()->route('servicos.index', [])->with('success', __('Servico created successfully.'));
        } catch (\Throwable $e) {
            return redirect()->route('servicos.create', [])->withInput($request->input())->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Servico $servico
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Servico $servico,) {

        return view('servicos.show', compact('servico'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Servico $servico
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Servico $servico,) {

        return view('servicos.edit', compact('servico'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Servico $servico,) {

        $request->validate([]);

        try {
            $servico->id_categoria_perfil = $request->id_categoria_perfil;
		$servico->id_categoria_tipo = $request->id_categoria_tipo;
		$servico->titulo = $request->titulo;
		$servico->descricao = $request->descricao;
		$servico->redirect_uri = $request->redirect_uri;
		$servico->icon = $request->icon;
            $servico->save();

            return redirect()->route('servicos.index', [])->with('success', __('Servico edited successfully.'));
        } catch (\Throwable $e) {
            return redirect()->route('servicos.edit', compact('servico'))->withInput($request->input())->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Servico $servico
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Servico $servico,) {

        try {
            $servico->delete();

            return redirect()->route('servicos.index', [])->with('success', __('Servico deleted successfully'));
        } catch (\Throwable $e) {
            return redirect()->route('servicos.index', [])->with('error', 'Cannot delete Servico: ' . $e->getMessage());
        }
    }

    
}
