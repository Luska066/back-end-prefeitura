<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Enum\EstruturaOrganizacional\Cargo;
use App\Models\Base\Estrutura;
use App\Models\CargosPessoaJuridica;
use App\Models\PessoaJuridica;
use Illuminate\Http\Request;

class EstruturaOrganizacional
{
    function getAll(Request $request){
        if(!empty($request->query('tipo'))){
            return \App\Models\Estrutura::where(
                'id_categoria',
                \App\Models\CategoriaEstruturaOrganizacional::where(
                    'nome',
                    $request->query('tipo'))->first()->id
                )
                ->with([
                    'pessoa_juridica',
                    'pessoa_juridica.cargo',
                    'categoria_estrutura_organizacional'
                ])->paginate(10);
        }
        return \App\Models\Estrutura::with(['pessoa_juridica','pessoa_juridica.cargo','categoria_estrutura_organizacional'])->paginate(10);
    }

    function getById(Request $request,$id){
        return \App\Models\Estrutura::with([
            'pessoa_juridica',
            'pessoa_juridica.cargo',
            'categoria_estrutura_organizacional'
        ])->find($id);
    }

    function getFilters(Request $request){
        return \App\Models\CategoriaEstruturaOrganizacional::all();
    }

    function gabinetePrefeito(Request $request){
        return response()->json(PessoaJuridica::with('cargo')->where('id_cargo', CargosPessoaJuridica::where('nome',Cargo::Prefeito->value)->first()->id)->first());
    }

    function gabineteVicePrefeito(Request $request){
        return response()->json(PessoaJuridica::with('cargo')->where('id_cargo', CargosPessoaJuridica::where('nome',Cargo::VicePrefeito->value)->first()->id)->first());
    }
}
