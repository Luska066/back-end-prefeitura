@extends('servicos.layout')

@section('servicos.content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex flex-row align-items-center justify-content-between">
                <ol class="breadcrumb m-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ implode('/', ['','servicos']) }}"> Servicos</a></li>
                    <li class="breadcrumb-item">@lang('Servico') #{{$servico->id}}</li>
                </ol>

                <a href="{{ route('servicos.index', []) }}" class="btn btn-light"><i class="fa fa-caret-left"></i> Back</a>
            </div>

            <div class="card-body">
                <table class="table table-striped">
    <tbody>
    <tr>
        <th scope="row">ID:</th>
        <td>{{$servico->id}}</td>
    </tr>
            <tr>
            <th scope="row">Id Categoria Perfil:</th>
            <td>{{ $servico->id_categoria_perfil ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">Id Categoria Tipo:</th>
            <td>{{ $servico->id_categoria_tipo ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">Titulo:</th>
            <td>{{ $servico->titulo ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">Descricao:</th>
            <td>{{ Str::limit($servico->descricao, 50) ?: "(blank)"}}</td>
        </tr>
            <tr>
            <th scope="row">Redirect Uri:</th>
            <td>{{ Str::limit($servico->redirect_uri, 50) ?: "(blank)"}}</td>
        </tr>
            <tr>
            <th scope="row">Icon:</th>
            <td>{{ $servico->icon ?: "(blank)" }}</td>
        </tr>
                <tr>
            <th scope="row">Created at</th>
            <td>{{Carbon\Carbon::parse($servico->created_at)->format('d/m/Y H:i:s')}}</td>
        </tr>
        <tr>
            <th scope="row">Updated at</th>
            <td>{{Carbon\Carbon::parse($servico->updated_at)->format('d/m/Y H:i:s')}}</td>
        </tr>
        </tbody>
</table>

            </div>

            <div class="card-footer d-flex flex-column flex-md-row align-items-center justify-content-end">
                <a href="{{ route('servicos.edit', compact('servico')) }}" class="btn btn-info text-nowrap me-1"><i class="fa fa-edit"></i> @lang('Edit')</a>
                <form action="{{ route('servicos.destroy', compact('servico')) }}" method="POST" class="m-0 p-0">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger text-nowrap"><i class="fa fa-trash"></i> @lang('Delete')</button>
                </form>
            </div>
        </div>
    </div>
@endsection
