<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\CategoriaPortalTransparencium;

class CategoriaPortalTransparenciumController extends Controller {

    public function __construct() {
	}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, ) {

        $categoriaPortalTransparencia = CategoriaPortalTransparencium::query();

        if(!empty($request->search)) {
			$categoriaPortalTransparencia->where('nome', 'like', '%' . $request->search . '%');
		}

        $categoriaPortalTransparencia = $categoriaPortalTransparencia->paginate(10);

        return view('categoria_portal_transparencias.index', compact('categoriaPortalTransparencia'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {

        return view('categoria_portal_transparencias.create', []);
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

            $categoriaPortalTransparencium = new CategoriaPortalTransparencium();
            $categoriaPortalTransparencium->nome = $request->nome;
            $categoriaPortalTransparencium->save();

            return redirect()->route('categ_portal_transparencia.index', [])->with('success', __('Categoria Portal Transparencium created successfully.'));
        } catch (\Throwable $e) {
            return redirect()->route('categ_portal_transparencia.create', [])->withInput($request->input())->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\CategoriaPortalTransparencium $categoriaPortalTransparencium
     *
     * @return \Illuminate\Http\Response
     */
    public function show(CategoriaPortalTransparencium $categoriaPortalTransparencium,) {

        return view('categoria_portal_transparencias.show', compact('categoriaPortalTransparencium'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\CategoriaPortalTransparencium $categoriaPortalTransparencium
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoriaPortalTransparencium $categoriaPortalTransparencium,) {

        return view('categoria_portal_transparencias.edit', compact('categoriaPortalTransparencium'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategoriaPortalTransparencium $categoriaPortalTransparencium,) {

        $request->validate(["nome" => "required"]);

        try {
            $categoriaPortalTransparencium->nome = $request->nome;
            $categoriaPortalTransparencium->save();

            return redirect()->route('categ_portal_transparencia.index', [])->with('success', __('Categoria Portal Transparencium edited successfully.'));
        } catch (\Throwable $e) {
            return redirect()->route('categ_portal_transparencia.edit', compact('categoriaPortalTransparencium'))->withInput($request->input())->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\CategoriaPortalTransparencium $categoriaPortalTransparencium
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoriaPortalTransparencium  $categ_portal_transparencium) {

        try {
            $categ_portal_transparencium->delete();

            return redirect()->route('categ_portal_transparencia.index', [])->with('success', __('Categoria Portal Transparencium deleted successfully'));
        } catch (\Throwable $e) {
            return redirect()->route('categ_portal_transparencia.index', [])->with('error', 'Cannot delete Categoria Portal Transparencium: ' . $e->getMessage());
        }
    }


}
