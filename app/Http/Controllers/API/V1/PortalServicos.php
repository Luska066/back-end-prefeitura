<?php

namespace App\Http\Controllers\API\V1;

use App\Models\Servico;
use App\Models\ServicosCategoriaPerfil;
use App\Models\ServicosCategoriaTipo;
use Illuminate\Http\Request;

class PortalServicos
{
    public function getAll(Request $request)
    {
        if (($request->query('perfil') && $request->query('categoria')) != null) {
            $id_categoria_categoria = ServicosCategoriaTipo::where('nome',$request->query('categoria'))->first()->id;
            $id_categoria_perfil = ServicosCategoriaPerfil::where('nome',$request->query('perfil'))->first()->id;
            return Servico::with([
                'servicos_categoria_tipo',
                'servicos_categoria_perfil'
            ])
                ->where('id_categoria_tipo',$id_categoria_categoria)
                ->where('id_categoria_perfil',$id_categoria_perfil)
                ->paginate(1);
        }

        if ($request->query('perfil') != null) {
            $id_categoria_perfil = ServicosCategoriaPerfil::where('nome',$request->query('perfil'))->first()->id;
            return Servico::with([
                'servicos_categoria_tipo',
                'servicos_categoria_perfil'
            ])
                ->where('id_categoria_perfil',$id_categoria_perfil)
                ->paginate(1);
        }

        if ($request->query('categoria') != null) {
            $id_categoria_categoria = ServicosCategoriaTipo::where('nome',$request->query('categoria'))->first()->id;
            return Servico::with([
                'servicos_categoria_tipo',
                'servicos_categoria_perfil'
            ])
                ->where('id_categoria_tipo',$id_categoria_categoria)
                ->paginate(1);
        }
        return Servico::with([
            'servicos_categoria_tipo',
            'servicos_categoria_perfil'
        ])->paginate(1);
    }

    public function getFiltersPerfilAndCategoria(Request $request)
    {
        return [
            "perfil" => ServicosCategoriaPerfil::all(),
            "categoria" => ServicosCategoriaTipo::all(),
        ];
    }
}
