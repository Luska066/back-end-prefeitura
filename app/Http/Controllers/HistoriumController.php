<?php

namespace App\Http\Controllers;

use App\Services\FileService;
use Illuminate\Http\Request;

use App\Models\Historium;

class HistoriumController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Historium::class, 'historium');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, )
    {

        $historia = Historium::query();

        if (!empty($request->search)) {
            $historia->where('title', 'like', '%' . $request->search . '%');
        }

        $historia = $historia->paginate(10);

        return view('historias.index', compact('historia'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('historias.create', []);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, )
    {

        $request->validate([
            "title" => "required",
            "fundacao" => "required",
            "aniversario" => "required",
            "gentilico" => "required",
            "populacao" => "required",
            "area" => "required",
            "content" => "required"
        ]);

        try {
            $filePath = $request->hasFile('image') ? FileService::storeImage($request, 'historia') : null;
            $historium = new Historium();
            $historium->title = $request->title;
            $historium->fundacao = $request->fundacao;
            $historium->aniversario = $request->aniversario;
            $historium->gentilico = $request->gentilico;
            $historium->populacao = $request->populacao;
            $historium->area = $request->area;
            $historium->content = $request->content;
            $historium->image = $filePath;
            $historium->save();

            return redirect()->route('historia.index', [])->with('success', __('Historium created successfully.'));
        } catch (\Throwable $e) {
            dd($e->getMessage());
            return redirect()->route('historia.create', [])->withInput($request->input())->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Historium $historium
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Historium $historium, )
    {

        return view('historias.show', compact('historium'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Historium $historium
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Historium $historium, )
    {

        return view('historias.edit', compact('historium'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Historium $historium, )
    {

        $request->validate([
            "title" => "required",
            "fundacao" => "required",
            "aniversario" => "required",
            "gentilico" => "required",
            "populacao" => "required",
            "area" => "required",
            "content" => "required"
        ]);

        try {
            $filePath = $request->hasFile('image') ? FileService::storeImage($request, 'historia') : null;
            $historium->title = $request->title;
            $historium->fundacao = $request->fundacao;
            $historium->aniversario = $request->aniversario;
            $historium->gentilico = $request->gentilico;
            $historium->populacao = $request->populacao;
            $historium->area = $request->area;
            $historium->content = $request->content;
            $historium->image = $filePath;
            $historium->save();

            return redirect()->route('historia.index', [])->with('success', __('Historium edited successfully.'));
        } catch (\Throwable $e) {
            dd($e);
            return redirect()->route('historia.edit', compact('historium'))->withInput($request->input())->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Historium $historium
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Historium $historium, )
    {

        try {
            $historium->delete();

            return redirect()->route('historia.index', [])->with('success', __('Historium deleted successfully'));
        } catch (\Throwable $e) {
            return redirect()->route('historia.index', [])->with('error', 'Cannot delete Historium: ' . $e->getMessage());
        }
    }


}
