@extends('servicos.layout')

@section('servicos.content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex flex-column flex-md-row align-items-md-center justify-content-between">
                <ol class="breadcrumb m-0 p-0 flex-grow-1 mb-2 mb-md-0">
                    <li class="breadcrumb-item"><a href="{{ implode('/', ['','servicos']) }}"> Servicos</a></li>
                </ol>

                <form action="{{ route('servicos.index', []) }}" method="GET" class="m-0 p-0">
                    <div class="input-group">
                        <input type="text" class="form-control form-control-sm me-2" name="search"
                               placeholder="Search Servicos..." value="{{ request()->search }}">
                        <span class="input-group-btn">
                            <button class="btn btn-info btn-sm" type="submit"><i class="fa fa-search"></i> @lang('Go!')</button>
                        </span>
                    </div>
                </form>
            </div>
            <div class="card-body">
                <table class="table table-striped table-responsive table-hover">
                    <thead role="rowgroup">
                    <tr role="row">
                        <th role='columnheader'>Id Categoria Perfil</th>
                        <th role='columnheader'>Id Categoria Tipo</th>
                        <th role='columnheader'>Titulo</th>
                        <th role='columnheader'>Descricao</th>
                        <th role='columnheader'>Redirect Uri</th>
                        <th role='columnheader'>Icon</th>
                        <th scope="col" data-label="Actions">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($servicos as $servico)
                        <tr>
                            <td data-label="Id Categoria Perfil">{{ $servico->servicos_categoria_perfil->nome ?: "(blank)" }}</td>
                            <td data-label="Id Categoria Tipo">{{ $servico->servicos_categoria_tipo->nome ?: "(blank)" }}</td>
                            <td data-label="Titulo">{{ $servico->titulo ?: "(blank)" }}</td>
                            <td data-label="Descricao">{{ Str::limit($servico->descricao, 50) ?: "(blank)"}}</td>
                            <td data-label="Redirect Uri">{{ Str::limit($servico->redirect_uri, 50) ?: "(blank)"}}</td>
                            <td data-label="Icon">{{ $servico->icon ?: "(blank)" }}</td>

                            <td data-label="Actions:" class="text-nowrap">
                                <a href="{{route('servicos.show', compact('servico'))}}" type="button"
                                   class="btn btn-primary btn-sm me-1">@lang('Show')</a>
                                <div class="btn-group btn-group-sm">
                                    <button type="button" class="btn btn-light dropdown-toggle"
                                            data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-cog"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item"
                                               href="{{route('servicos.edit', compact('servico'))}}">@lang('Edit')</a>
                                        </li>
                                        <li>
                                            <form action="{{route('servicos.destroy', compact('servico'))}}"
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

                {{ $servicos->withQueryString()->links() }}
            </div>
            <div class="text-center my-2">
                <a href="{{ route('servicos.create', []) }}" class="btn btn-primary"><i
                        class="fa fa-plus"></i> @lang('Create new Servico')</a>
            </div>
        </div>
    </div>
@endsection
