@extends('noticias.layout')

@section('noticias.content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex flex-column flex-md-row align-items-md-center justify-content-between">
                <ol class="breadcrumb m-0 p-0 flex-grow-1 mb-2 mb-md-0">
                    <li class="breadcrumb-item"><a href="{{ implode('/', ['','noticias']) }}"> Noticias</a></li>
                </ol>

                <form action="{{ route('noticias.index', []) }}" method="GET" class="m-0 p-0">
                    <div class="input-group">
                        <input type="text" class="form-control form-control-sm me-2" name="search" placeholder="Search Noticias..." value="{{ request()->search }}">
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
                    <th role='columnheader'>Titulo</th>
                    {{-- <th role='columnheader'>Image Url</th> --}}
                    <th role='columnheader'>Conteudo</th>
                    <th role='columnheader'>Categoria</th>
                <th scope="col" data-label="Actions">Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach($noticias as $noticia)
        <tr>
                            <td data-label="Titulo">{{ $noticia->titulo ?: "(blank)" }}</td>
                            {{-- <td data-label="Image Url">{{ $noticia->image_url ?: "(blank)" }}</td> --}}
                            <td data-label="Conteudo">{{ Str::limit($noticia->conteudo, 50) ?: "(blank)"}}</td>
                            <td data-label="Categoria">{{ $noticia->categoria_nome ?: "(blank)" }}</td>                                                                                

            <td data-label="Actions:" class="text-nowrap">
                                   <a href="{{route('noticias.show', compact('noticia'))}}" type="button" class="btn btn-primary btn-sm me-1">@lang('Show')</a>
<div class="btn-group btn-group-sm">
    <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-cog"></i></button>
    <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="{{route('noticias.edit', compact('noticia'))}}">@lang('Edit')</a></li>
        <li>
            <form action="{{route('noticias.destroy', compact('noticia'))}}" method="POST" style="display: inline;" class="m-0 p-0">
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

                {{ $noticias->withQueryString()->links() }}
            </div>
            <div class="text-center my-2">
                <a href="{{ route('noticias.create', []) }}" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('Create new Noticia')</a>
            </div>
        </div>
    </div>
@endsection
