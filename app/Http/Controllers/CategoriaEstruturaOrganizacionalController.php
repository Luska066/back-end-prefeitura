<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\CategoriaEstruturaOrganizacional;

class CategoriaEstruturaOrganizacionalController extends Controller {

    public function __construct() {
//		$this->authorizeResource(CategoriaEstruturaOrganizacional::class, 'categoriaEstruturaOrganizacional');
	}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, ) {

        $categoriaEstruturaOrganizacionals = CategoriaEstruturaOrganizacional::query();

        if(!empty($request->search)) {
            $categoriaEstruturaOrganizacionals->where('nome', 'like', '%' . $request->search . '%');
		}

        $categoriaEstruturaOrganizacionals = $categoriaEstruturaOrganizacionals->paginate(10);

        return view('categoria_estrutura_organizacionals.index', compact('categoriaEstruturaOrganizacionals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {

        return view('categoria_estrutura_organizacionals.create', []);
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

            $categoriaEstruturaOrganizacional = new CategoriaEstruturaOrganizacional();
            $categoriaEstruturaOrganizacional->nome = $request->nome;
            $categoriaEstruturaOrganizacional->save();

            return redirect()->route('categ_est_organizacional.index', [])->with('success', __('Categoria Estrutura Organizacional created successfully.'));
        } catch (\Throwable $e) {
            return redirect()->route('categ_est_organizacional.create', [])->withInput($request->input())->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\CategoriaEstruturaOrganizacional $categoriaEstruturaOrganizacional
     *
     * @return \Illuminate\Http\Response
     */
    public function show(CategoriaEstruturaOrganizacional $categoriaEstruturaOrganizacional,) {

        return view('categoria_estrutura_organizacionals.show', compact('categoriaEstruturaOrganizacional'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\CategoriaEstruturaOrganizacional $categoriaEstruturaOrganizacional
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoriaEstruturaOrganizacional $categ_est_organizacional,) {

        return view('categoria_estrutura_organizacionals.edit', compact('categ_est_organizacional'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategoriaEstruturaOrganizacional $categ_est_organizacional,) {

        $request->validate([]);

        try {
            $categ_est_organizacional->nome = $request->nome;
            $categ_est_organizacional->save();

            return redirect()->route('categ_est_organizacional.index', [])->with('success', __('Categoria Estrutura Organizacional edited successfully.'));
        } catch (\Throwable $e) {
            return redirect()->route('categ_est_organizacional.edit', compact('categoriaEstruturaOrganizacional'))->withInput($request->input())->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\CategoriaEstruturaOrganizacional $categoriaEstruturaOrganizacional
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoriaEstruturaOrganizacional $categ_est_organizacional,) {

        try {
            $categ_est_organizacional->delete();

            return redirect()->route('categ_est_organizacional.index', [])->with('success', __('Categoria Estrutura Organizacional deleted successfully'));
        } catch (\Throwable $e) {
            return redirect()->route('categ_est_organizacional.index', [])->with('error', 'Cannot delete Categoria Estrutura Organizacional: ' . $e->getMessage());
        }
    }


}
