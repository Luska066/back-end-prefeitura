<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Estrutura;

class EstruturaController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Estrutura::class, 'estrutura');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $estruturas = Estrutura::query()->paginate(10)->withQueryString();

        return view('estruturas.index', compact('estruturas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('estruturas.create', []);
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
            $estrutura = new Estrutura();
            $estrutura->fill($request->all());
            $estrutura->save();

            return redirect()->route('estrutura.index', [])->with('success', __('Estrutura created successfully.'));
        } catch (\Throwable $e) {
            return redirect()->route('estrutura.create', [])->withInput($request->input())->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Estrutura $estrutura
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Estrutura $estrutura)
    {

        return view('estruturas.show', compact('estrutura'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Estrutura $estrutura
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Estrutura $estrutura)
    {

        return view('estruturas.edit', compact('estrutura'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Estrutura $estrutura)
    {

        $request->validate([]);

        try {
            $estrutura->fill($request->all());
            $estrutura->save();

            return redirect()->route('estrutura.index', [])->with('success', __('Estrutura edited successfully.'));
        } catch (\Throwable $e) {
            return redirect()->route('estrutura.edit', compact('estrutura'))->withInput($request->input())->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Estrutura $estrutura
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estrutura $estrutura)
    {

        try {
            $estrutura->delete();

            return redirect()->route('estrutura.index', [])->with('success', __('Estrutura deleted successfully'));
        } catch (\Throwable $e) {
            return redirect()->route('estrutura.index', [])->with('error', 'Cannot delete Estrutura: ' . $e->getMessage());
        }
    }


}
