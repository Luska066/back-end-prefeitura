@extends('servicos_categoria_tipos.layout')

@section('servicosCategoriaTipo.content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex flex-row align-items-center justify-content-between">
                <ol class="breadcrumb m-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ implode('/', ['','servicos_categoria_tipos']) }}"> Servicos Categoria Tipo</a></li>
                    <li class="breadcrumb-item">@lang('Servicos Categoria Tipo') #{{$servicosCategoriaTipo->id}}</li>
                </ol>

                <a href="{{ route('servicos_categoria_tipos.index', []) }}" class="btn btn-light"><i class="fa fa-caret-left"></i> Back</a>
            </div>

            <div class="card-body">
                <table class="table table-striped">
    <tbody>
    <tr>
        <th scope="row">ID:</th>
        <td>{{$servicosCategoriaTipo->id}}</td>
    </tr>
            <tr>
            <th scope="row">Nome:</th>
            <td>{{ $servicosCategoriaTipo->nome ?: "(blank)" }}</td>
        </tr>
                <tr>
            <th scope="row">Created at</th>
            <td>{{Carbon\Carbon::parse($servicosCategoriaTipo->created_at)->format('d/m/Y H:i:s')}}</td>
        </tr>
        <tr>
            <th scope="row">Updated at</th>
            <td>{{Carbon\Carbon::parse($servicosCategoriaTipo->updated_at)->format('d/m/Y H:i:s')}}</td>
        </tr>
        </tbody>
</table>

            </div>

            <div class="card-footer d-flex flex-column flex-md-row align-items-center justify-content-end">
                <a href="{{ route('servicos_categoria_tipos.edit', compact('servicosCategoriaTipo')) }}" class="btn btn-info text-nowrap me-1"><i class="fa fa-edit"></i> @lang('Edit')</a>
                <form action="{{ route('servicos_categoria_tipos.destroy', compact('servicosCategoriaTipo')) }}" method="POST" class="m-0 p-0">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger text-nowrap"><i class="fa fa-trash"></i> @lang('Delete')</button>
                </form>
            </div>
        </div>
    </div>
@endsection
