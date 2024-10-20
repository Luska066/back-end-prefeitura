<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\CargosPessoaJuridica;

class CargosPessoaJuridicaController extends Controller {

    public function __construct() {
//		$this->authorizeResource(CargosPessoaJuridica::class, 'cargosPessoaJuridica');
	}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, ) {

        $cargosPessoaJuridica = CargosPessoaJuridica::query();

        if(!empty($request->search)) {
			$cargosPessoaJuridica->where('nome', 'like', '%' . $request->search . '%');
		}

        $cargosPessoaJuridicas = $cargosPessoaJuridica->paginate(10)->withQueryString();

        return view('cargos_pessoa_juridicas.index', compact('cargosPessoaJuridicas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {

        return view('cargos_pessoa_juridicas.create', []);
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

            $cargosPessoaJuridica = new CargosPessoaJuridica();
            $cargosPessoaJuridica->nome = $request->nome;
            $cargosPessoaJuridica->save();

            return redirect()->route('cargos_pessoa_juridica.index', [])->with('success', __('Cargos Pessoa Juridica created successfully.'));
        } catch (\Throwable $e) {
            return redirect()->route('cargos_pessoa_juridica.create', [])->withInput($request->input())->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\CargosPessoaJuridica $cargosPessoaJuridica
     *
     * @return \Illuminate\Http\Response
     */
    public function show(CargosPessoaJuridica $cargosPessoaJuridica,) {

        return view('cargos_pessoa_juridicas.show', compact('cargosPessoaJuridica'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\CargosPessoaJuridica $cargosPessoaJuridica
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(CargosPessoaJuridica $cargosPessoaJuridica,) {

        return view('cargos_pessoa_juridicas.edit', compact('cargosPessoaJuridica'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CargosPessoaJuridica $cargosPessoaJuridica,) {

        $request->validate(["nome" => "required"]);

        try {
            $cargosPessoaJuridica->nome = $request->nome;
            $cargosPessoaJuridica->save();

            return redirect()->route('cargos_pessoa_juridica.index', [])->with('success', __('Cargos Pessoa Juridica edited successfully.'));
        } catch (\Throwable $e) {
            return redirect()->route('cargos_pessoa_juridica.edit', compact('cargosPessoaJuridica'))->withInput($request->input())->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\CargosPessoaJuridica $cargosPessoaJuridica
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(CargosPessoaJuridica $cargosPessoaJuridica,) {

        try {
            $cargosPessoaJuridica->delete();

            return redirect()->route('cargos_pessoa_juridica.index', [])->with('success', __('Cargos Pessoa Juridica deleted successfully'));
        } catch (\Throwable $e) {
            return redirect()->route('cargos_pessoa_juridica.index', [])->with('error', 'Cannot delete Cargos Pessoa Juridica: ' . $e->getMessage());
        }
    }


}
