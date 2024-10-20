@extends('historias.layout')

@section('historia.content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex flex-column flex-md-row align-items-md-center justify-content-between">
                <ol class="breadcrumb m-0 p-0 flex-grow-1 mb-2 mb-md-0">
                    <li class="breadcrumb-item"><a href="{{ implode('/', ['', 'historias']) }}"> Historia</a></li>
                </ol>

                <form action="{{ route('historia.index', []) }}" method="GET" class="m-0 p-0">
                    <div class="input-group">
                        <input type="text" class="form-control form-control-sm me-2" name="search"
                            placeholder="Search Historia..." value="{{ request()->search }}">
                        <span class="input-group-btn">
                            <button class="btn btn-info btn-sm" type="submit"><i class="fa fa-search"></i>
                                @lang('Go!')</button>
                        </span>
                    </div>
                </form>
            </div>
            <div class="card-body">
                <table class="table table-striped table-responsive table-hover">
                    <thead role="rowgroup">
                        <tr role="row">
                            <th role='columnheader'>Title</th>
                            <th role='columnheader'>Fundacao</th>
                            <th role='columnheader'>Aniversario</th>
                            <th role='columnheader'>Gentilico</th>
                            <th role='columnheader'>Populacao</th>
                            <th role='columnheader'>Area</th>
                            <th role='columnheader'>Content</th>
                            <th role='columnheader'>Image</th>
                            <th scope="col" data-label="Actions">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($historia as $historium)
                            <tr>
                                <td data-label="Title">{{ $historium->title ?: '(blank)' }}</td>
                                <td data-label="Fundacao">{{ $historium->fundacao ?: '(blank)' }}</td>
                                <td data-label="Aniversario">{{ $historium->aniversario ?: '(blank)' }}</td>
                                <td data-label="Gentilico">{{ $historium->gentilico ?: '(blank)' }}</td>
                                <td data-label="Populacao">{{ $historium->populacao ?: '(blank)' }}</td>
                                <td data-label="Area">{{ $historium->area ?: '(blank)' }}</td>
                                <td data-label="Content">{{ Str::limit($historium->content, 50) ?: '(blank)' }}</td>
                                <td data-label="Image">{{ $historium->image ?: '(blank)' }}</td>

                                <td data-label="Actions:" class="text-nowrap">
                                    <a href="{{ route('historia.show', $historium->id) }}" type="button"
                                        class="btn btn-primary btn-sm me-1">@lang('Show')</a>
                                    <div class="btn-group btn-group-sm">
                                        <button type="button" class="btn btn-light dropdown-toggle"
                                            data-bs-toggle="dropdown" aria-expanded="false"><i
                                                class="fa fa-cog"></i></button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item"
                                                    href="{{ route('historia.edit', $historium->id) }}">@lang('Edit')</a>
                                            </li>
                                            <li>
                                                <form action="{{ route('historia.destroy',$historium->id) }}"
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

                {{ $historia->withQueryString()->links() }}
            </div>
            <div class="text-center my-2">
                <a href="{{ route('historia.create', []) }}" class="btn btn-primary"><i class="fa fa-plus"></i>
                    @lang('Create new Historium')</a>
            </div>
        </div>
    </div>
    
@endsection
