@extends('servicos_categoria_perfils.layout')

@section('servicosCategoriaPerfil.content')
    <div class="container">
        <h2 class="font-weight-bold my-4">Serviços - Categoria Perfil</h2>
        <div class="card">
            <div class="card-body">
                <table class="table table-striped table-responsive-lg table-hover">
                    <thead role="rowgroup">
                    <tr role="row">
                        <th role='columnheader'>Nome</th>
                        <th scope="col" data-label="Actions">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($servicosCategoriaPerfils as $servicosCategoriaPerfil)
                        <tr>
                            <td data-label="Nome">{{ $servicosCategoriaPerfil->nome ?: "(blank)" }}</td>

                            <td data-label="Actions:" class="text-nowrap">
                                <a href="{{route('servico_categoria_perfil.show', $servicosCategoriaPerfil->id)}}"
                                   type="button" class="btn btn-primary btn-sm me-1">@lang('Show')</a>
                                <div class="btn-group btn-group-sm">
                                    <button type="button" class="btn btn-light dropdown-toggle"
                                            data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-cog"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item"
                                               href="{{route('servico_categoria_perfil.edit', $servicosCategoriaPerfil->id)}}">@lang('Edit')</a>
                                        </li>
                                        <li>
                                            <form
                                                action="{{route('servico_categoria_perfil.destroy', $servicosCategoriaPerfil->id)}}"
                                                method="POST" style="display: inline;" class="m-0 p-0">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item">@lang('Delete')</button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                {{ $servicosCategoriaPerfils->withQueryString()->links() }}
            </div>
            <div class="text-center my-2">
                <a href="{{ route('servico_categoria_perfil.create', []) }}" class="btn btn-primary"><i
                        class="fa fa-plus"></i> @lang('Create new Servicos Categoria Perfil')</a>
            </div>
        </div>
    </div>
@endsection
