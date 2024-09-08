@extends('categoria_estrutura_organizacionals.layout')

@section('categoriaEstruturaOrganizacional.content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex flex-row align-items-center justify-content-between">
                <ol class="breadcrumb m-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ implode('/', ['','categoria_estrutura_organizacionals']) }}"> Categoria Estrutura Organizacional</a></li>
                    <li class="breadcrumb-item">@lang('Categoria Estrutura Organizacional') #{{$categoriaEstruturaOrganizacional->id}}</li>
                </ol>

                <a href="{{ route('categoria_estrutura_organizacionals.index', []) }}" class="btn btn-light"><i class="fa fa-caret-left"></i> Back</a>
            </div>

            <div class="card-body">
                <table class="table table-striped">
    <tbody>
    <tr>
        <th scope="row">ID:</th>
        <td>{{$categoriaEstruturaOrganizacional->id}}</td>
    </tr>
            <tr>
            <th scope="row">Nome:</th>
            <td>{{ $categoriaEstruturaOrganizacional->nome ?: "(blank)" }}</td>
        </tr>
                <tr>
            <th scope="row">Created at</th>
            <td>{{Carbon\Carbon::parse($categoriaEstruturaOrganizacional->created_at)->format('d/m/Y H:i:s')}}</td>
        </tr>
        <tr>
            <th scope="row">Updated at</th>
            <td>{{Carbon\Carbon::parse($categoriaEstruturaOrganizacional->updated_at)->format('d/m/Y H:i:s')}}</td>
        </tr>
        </tbody>
</table>

            </div>

            <div class="card-footer d-flex flex-column flex-md-row align-items-center justify-content-end">
                <a href="{{ route('categoria_estrutura_organizacionals.edit', compact('categoriaEstruturaOrganizacional')) }}" class="btn btn-info text-nowrap me-1"><i class="fa fa-edit"></i> @lang('Edit')</a>
                <form action="{{ route('categoria_estrutura_organizacionals.destroy', compact('categoriaEstruturaOrganizacional')) }}" method="POST" class="m-0 p-0">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger text-nowrap"><i class="fa fa-trash"></i> @lang('Delete')</button>
                </form>
            </div>
        </div>
    </div>
@endsection
