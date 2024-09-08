@extends('estruturas.layout')

@section('estrutura.content')
    <div class="container">
        <h1 class="py-4 font-weight-bold">Estrutura Organizacional</h1>

        <div class="card">
            <div class="card-body">
                <table class="table table-striped table-responsive-lg table-hover">
                    <thead role="rowgroup">
                    <tr role="row">
                        <th role='columnheader'>Title</th>
                        <th role='columnheader'>Categoria</th>
                        <th role='columnheader'>Pessoa Juridica</th>
                        <th scope="col" data-label="Actions">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($estruturas as $estrutura)
                        <tr>
                            <td data-label="Title">{{ $estrutura->title ?: "(blank)" }}</td>
                            <td data-label="Id Categoria">{{ $estrutura->categoria_estrutura_organizacional->nome ?: "(blank)" }}</td>
                            <td data-label="Id Pessoa Juridica">{{ $estrutura->pessoa_juridica->nome ?: "(blank)" }}</td>
                            <td data-label="Actions:" class="text-nowrap">
                                <a href="{{route('estrutura.show', compact('estrutura'))}}" type="button"
                                   class="btn btn-primary btn-sm me-1">@lang('Show')</a>
                                <div class="btn-group btn-group-sm">
                                    <button type="button" class="btn btn-light dropdown-toggle"
                                            data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-cog"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item"
                                               href="{{route('estrutura.edit', compact('estrutura'))}}">@lang('Edit')</a>
                                        </li>
                                        <li>
                                            <form action="{{route('estrutura.destroy', compact('estrutura'))}}"
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

                {{ $estruturas->withQueryString()->links() }}
            </div>
            <div class="text-center my-2">
                <a href="{{ route('estrutura.create', []) }}" class="btn btn-primary"><i
                        class="fa fa-plus"></i> @lang('Create new Estrutura')</a>
            </div>
        </div>
    </div>
@endsection
