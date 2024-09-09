@extends('servicos_categoria_tipos.layout')

@section('servicosCategoriaTipo.content')
    <div class="container">
        <h2 class="font-weight-bold my-4">Serviços - Categoria Tipos</h2>
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
                    @foreach($servicosCategoriaTipos as $servicosCategoriaTipo)
                        <tr>
                            <td data-label="Nome">{{ $servicosCategoriaTipo->nome ?: "(blank)" }}</td>

                            <td data-label="Actions:" class="text-nowrap">
                                <a href="{{route('servicos_categoria_tipo.show', $servicosCategoriaTipo->id)}}"
                                   type="button" class="btn btn-primary btn-sm me-1">@lang('Show')</a>
                                <div class="btn-group btn-group-sm">
                                    <button type="button" class="btn btn-light dropdown-toggle"
                                            data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-cog"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item"
                                               href="{{route('servicos_categoria_tipo.edit', $servicosCategoriaTipo->id)}}">@lang('Edit')</a>
                                        </li>
                                        <li>
                                            <form
                                                action="{{route('servicos_categoria_tipo.destroy', $servicosCategoriaTipo->id)}}"
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

                {{ $servicosCategoriaTipos->withQueryString()->links() }}
            </div>
            <div class="text-center my-2">
                <a href="{{ route('servicos_categoria_tipo.create', []) }}" class="btn btn-primary"><i
                        class="fa fa-plus"></i> @lang('Create new Servicos Categoria Tipo')</a>
            </div>
        </div>
    </div>
@endsection
