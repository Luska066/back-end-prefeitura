@extends('categoria_portal_transparencias.layout')

@section('categoriaPortalTransparencia.content')
    <div class="container">
        <h2 class="font-weight-bold my-4">Portal de Transparência - Categorias</h2>
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
                    @foreach($categoriaPortalTransparencia as $categoriaPortalTransparencium)
                        <tr>
                            <td data-label="Nome">{{ $categoriaPortalTransparencium->nome ?: "(blank)" }}</td>

                            <td data-label="Actions:" class="text-nowrap">
                                <a href="{{route('categ_portal_transparencia.show',  $categoriaPortalTransparencium->id)}}"
                                   type="button" class="btn btn-primary btn-sm me-1">@lang('Show')</a>
                                <div class="btn-group btn-group-sm">
                                    <button type="button" class="btn btn-light dropdown-toggle"
                                            data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-cog"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item"
                                               href="{{route('categ_portal_transparencia.edit', $categoriaPortalTransparencium->id)}}">@lang('Edit')</a>
                                        </li>
                                        <li>
                                            <form
                                                action="{{route('categ_portal_transparencia.destroy',  $categoriaPortalTransparencium->id)}}"
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

                {{ $categoriaPortalTransparencia->withQueryString()->links() }}
            </div>
            <div class="text-center my-2">
                <a href="{{ route('categ_portal_transparencia.create', []) }}" class="btn btn-primary"><i
                        class="fa fa-plus"></i> @lang('Create new Categoria Portal Transparencium')</a>
            </div>
        </div>
    </div>
@endsection
