<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\PessoaJuridica;

class PessoaJuridicaController extends Controller
{

    public function __construct()
    {
//        $this->authorizeResource(PessoaJuridica::class, 'pessoaJuridica');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $pessoaJuridicas = PessoaJuridica::query();

        if (!empty($request->search)) {
            $pessoaJuridicas->where('nome', 'like', '%' . $request->search . '%');
        }

        $pessoaJuridicas = $pessoaJuridicas->paginate(10);

        return view('pessoa_juridicas.index', compact('pessoaJuridicas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('pessoa_juridicas.create', []);
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

            $pessoaJuridica = new PessoaJuridica();
            $pessoaJuridica->nome = $request->nome;
            $pessoaJuridica->email = $request->email;
            $pessoaJuridica->horario = $request->horario;
            $pessoaJuridica->endereco = $request->endereco;
            $pessoaJuridica->competencias = $request->competencias;
            $pessoaJuridica->save();

            return redirect()->route('pessoa_juridica.index', [])->with('success', __('Pessoa Juridica created successfully.'));
        } catch (\Throwable $e) {
            return redirect()->route('pessoa_juridica.create', [])->withInput($request->input())->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\PessoaJuridica $pessoaJuridica
     *
     * @return \Illuminate\Http\Response
     */
    public function show(PessoaJuridica $pessoaJuridica)
    {

        return view('pessoa_juridicas.show', compact('pessoaJuridica'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\PessoaJuridica $pessoaJuridica
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(PessoaJuridica $pessoaJuridica)
    {

        return view('pessoa_juridicas.edit', compact('pessoaJuridica'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PessoaJuridica $pessoaJuridica)
    {

        $request->validate([]);

        try {
            $pessoaJuridica->nome = $request->nome;
            $pessoaJuridica->email = $request->email;
            $pessoaJuridica->horario = $request->horario;
            $pessoaJuridica->endereco = $request->endereco;
            $pessoaJuridica->competencias = $request->competencias;
            $pessoaJuridica->save();

            return redirect()->route('pessoa_juridica.index', [])->with('success', __('Pessoa Juridica edited successfully.'));
        } catch (\Throwable $e) {
            return redirect()->route('pessoa_juridica.edit', compact('pessoaJuridica'))->withInput($request->input())->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\PessoaJuridica $pessoaJuridica
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(PessoaJuridica $pessoaJuridica)
    {

        try {
            $pessoaJuridica->delete();

            return redirect()->route('pessoa_juridica.index', [])->with('success', __('Pessoa Juridica deleted successfully'));
        } catch (\Throwable $e) {
            return redirect()->route('pessoa_juridica.index', [])->with('error', 'Cannot delete Pessoa Juridica: ' . $e->getMessage());
        }
    }


}
