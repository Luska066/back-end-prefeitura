@extends('estruturas.layout')

@section('estrutura.content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex flex-row align-items-center justify-content-between">
                <ol class="breadcrumb m-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ implode('/', ['','estruturas']) }}"> Estrutura</a></li>
                    <li class="breadcrumb-item">@lang('Estrutura') #{{$estrutura->id}}</li>
                </ol>

                <a href="{{ route('estruturas.index', []) }}" class="btn btn-light"><i class="fa fa-caret-left"></i> Back</a>
            </div>

            <div class="card-body">
                <table class="table table-striped">
    <tbody>
    <tr>
        <th scope="row">ID:</th>
        <td>{{$estrutura->id}}</td>
    </tr>
            <tr>
            <th scope="row">Id Categoria:</th>
            <td>{{ $estrutura->id_categoria ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">Id Pessoa Juridica:</th>
            <td>{{ $estrutura->id_pessoa_juridica ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">Title:</th>
            <td>{{ $estrutura->title ?: "(blank)" }}</td>
        </tr>
                <tr>
            <th scope="row">Created at</th>
            <td>{{Carbon\Carbon::parse($estrutura->created_at)->format('d/m/Y H:i:s')}}</td>
        </tr>
        <tr>
            <th scope="row">Updated at</th>
            <td>{{Carbon\Carbon::parse($estrutura->updated_at)->format('d/m/Y H:i:s')}}</td>
        </tr>
        </tbody>
</table>

            </div>

            <div class="card-footer d-flex flex-column flex-md-row align-items-center justify-content-end">
                <a href="{{ route('estruturas.edit', compact('estrutura')) }}" class="btn btn-info text-nowrap me-1"><i class="fa fa-edit"></i> @lang('Edit')</a>
                <form action="{{ route('estruturas.destroy', compact('estrutura')) }}" method="POST" class="m-0 p-0">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger text-nowrap"><i class="fa fa-trash"></i> @lang('Delete')</button>
                </form>
            </div>
        </div>
    </div>
@endsection
