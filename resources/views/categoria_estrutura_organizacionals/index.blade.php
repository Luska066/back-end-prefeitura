@extends('categoria_estrutura_organizacionals.layout')

@section('categoriaEstruturaOrganizacional.content')
    <div class="container">
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
                    @foreach($categoriaEstruturaOrganizacionals as $categoriaEstruturaOrganizacional)
                        <tr>
                            <td data-label="Nome">{{ $categoriaEstruturaOrganizacional->nome ?: "(blank)" }}</td>

                            <td data-label="Actions:" class="text-nowrap">
                                <a href="{{route('categ_est_organizacional.show', $categoriaEstruturaOrganizacional->id)}}"
                                   type="button" class="btn btn-primary btn-sm me-1">@lang('Show')</a>
                                <div class="btn-group btn-group-sm">
                                    <button type="button" class="btn btn-light dropdown-toggle"
                                            data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-cog"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item"
                                               href="{{route('categ_est_organizacional.edit', $categoriaEstruturaOrganizacional->id)}}">@lang('Edit')</a>
                                        </li>
                                        <li>
                                            <form
                                                action="{{route('categ_est_organizacional.destroy',  $categoriaEstruturaOrganizacional->id)}}"
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

                {{ $categoriaEstruturaOrganizacionals->withQueryString()->links() }}
            </div>
            <div class="text-center my-2">
                <a href="{{ route('categ_est_organizacional.create', []) }}" class="btn btn-primary"><i
                        class="fa fa-plus"></i> @lang('Create new Categoria Estrutura Organizacional')</a>
            </div>
        </div>
    </div>
@endsection
