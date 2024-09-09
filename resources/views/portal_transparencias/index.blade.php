@extends('portal_transparencias.layout')

@section('portalTransparencia.content')
    <div class="container ">
        <h2 class="font-weight-bold my-4">Portal Transparência</h2>
        <div class="card">

            <div class="card-body">
                <table class="table table-striped table-responsive-lg table-hover">
                    <thead role="rowgroup">
                    <tr role="row">
                        <th role='columnheader'>Titulo</th>
                        <th role='columnheader'>Categoria</th>
                        <th role='columnheader'>Redirect Uri</th>
                        <th role='columnheader'>Icon</th>
                        <th scope="col" data-label="Actions">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($portalTransparencia as $portalTransparencium)
                        <tr>
                            <td data-label="Titulo">{{ $portalTransparencium->titulo ?: "(blank)" }}</td>
                            <td data-label="Id Categoria Portal Transparencia">{{ $portalTransparencium->categoria_portal_transparencium->nome ?: "(blank)" }}</td>
                            <td data-label="Redirect Uri">{{ Str::limit($portalTransparencium->redirect_uri, 50) ?: "(blank)"}}</td>
                            <td data-label="Icon">{{ $portalTransparencium->icon ?: "(blank)" }}</td>

                            <td data-label="Actions:" class="text-nowrap">
                                <a href="{{route('portal_transparencia.show', $portalTransparencium->id)}}"
                                   type="button" class="btn btn-primary btn-sm me-1">@lang('Show')</a>
                                <div class="btn-group btn-group-sm">
                                    <button type="button" class="btn btn-light dropdown-toggle"
                                            data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-cog"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item"
                                               href="{{route('portal_transparencia.edit', $portalTransparencium->id)}}">@lang('Edit')</a>
                                        </li>
                                        <li>
                                            <form
                                                action="{{route('portal_transparencia.destroy', $portalTransparencium->id)}}"
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

                {{ $portalTransparencia->withQueryString()->links() }}
            </div>
            <div class="text-center my-2">
                <a href="{{ route('portal_transparencia.create', []) }}" class="btn btn-primary"><i
                        class="fa fa-plus"></i> @lang('Create new Portal Transparencium')</a>
            </div>
        </div>
    </div>
@endsection
