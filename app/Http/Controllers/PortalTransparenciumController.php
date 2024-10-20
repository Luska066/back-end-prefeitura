<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\PortalTransparencium;

class PortalTransparenciumController extends Controller
{

    public function __construct()
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $portalTransparencia = PortalTransparencium::query();

        if (!empty($request->search)) {
            $portalTransparencia->where('titulo', 'like', '%' . $request->search . '%');
        }

        $portalTransparencia = $portalTransparencia->paginate(10);

        return view('portal_transparencias.index', compact('portalTransparencia'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('portal_transparencias.create', []);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([]);

        try {

            $portalTransparencium = new PortalTransparencium();
            $portalTransparencium->titulo = $request->titulo;
            $portalTransparencium->id_categoria_portal_transparencia = $request->id_categoria_portal_transparencia;
            $portalTransparencium->redirect_uri = $request->redirect_uri;
            $portalTransparencium->icon = "fa-".$request->icon;
            $portalTransparencium->save();

            return redirect()->route('portal_transparencia.index', [])->with('success', __('Portal Transparencium created successfully.'));
        } catch (\Throwable $e) {
            return redirect()->route('portal_transparencia.create', [])->withInput($request->input())->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\PortalTransparencium $portalTransparencium
     *
     * @return \Illuminate\Http\Response
     */
    public function show(PortalTransparencium $portalTransparencium)
    {

        return view('portal_transparencias.show', compact('portalTransparencium'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\PortalTransparencium $portalTransparencium
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(PortalTransparencium $portalTransparencium)
    {

        return view('portal_transparencias.edit', compact('portalTransparencium'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PortalTransparencium $portalTransparencium)
    {

        $request->validate([]);

        try {
            $portalTransparencium->titulo = $request->titulo;
            $portalTransparencium->id_categoria_portal_transparencia = $request->id_categoria_portal_transparencia;
            $portalTransparencium->redirect_uri = $request->redirect_uri;
            $portalTransparencium->icon = "fa-".$request->icon;
            $portalTransparencium->save();

            return redirect()->route('portal_transparencia.index', [])->with('success', __('Portal Transparencium edited successfully.'));
        } catch (\Throwable $e) {
            return redirect()->route('portal_transparencia.edit', compact('portalTransparencium'))->withInput($request->input())->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\PortalTransparencium $portal_transparencium
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(PortalTransparencium $portal_transparencium)
    {
        try {
            $portal_transparencium->delete();

            return redirect()->route('portal_transparencia.index', [])->with('success', __('Portal Transparencium deleted successfully'));
        } catch (\Throwable $e) {
            return redirect()->route('portal_transparencia.index', [])->with('error', 'Cannot delete Portal Transparencium: ' . $e->getMessage());
        }
    }


}
