@extends('pessoa_juridicas.layout')

@section('pessoaJuridica.content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex flex-row align-items-center justify-content-between">
                <ol class="breadcrumb m-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ implode('/', ['','pessoa_juridicas']) }}"> Pessoa Juridica</a></li>
                    <li class="breadcrumb-item">@lang('Pessoa Juridica') #{{$pessoaJuridica->id}}</li>
                </ol>

                <a href="{{ route('pessoa_juridicas.index', []) }}" class="btn btn-light"><i class="fa fa-caret-left"></i> Back</a>
            </div>

            <div class="card-body">
                <table class="table table-striped">
    <tbody>
    <tr>
        <th scope="row">ID:</th>
        <td>{{$pessoaJuridica->id}}</td>
    </tr>
            <tr>
            <th scope="row">Nome:</th>
            <td>{{ $pessoaJuridica->nome ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">Email:</th>
            <td>{{ $pessoaJuridica->email ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">Horario:</th>
            <td>{{ Str::limit($pessoaJuridica->horario, 50) ?: "(blank)"}}</td>
        </tr>
            <tr>
            <th scope="row">Endereco:</th>
            <td>{{ Str::limit($pessoaJuridica->endereco, 50) ?: "(blank)"}}</td>
        </tr>
            <tr>
            <th scope="row">Competencias:</th>
            <td>{{ Str::limit($pessoaJuridica->competencias, 50) ?: "(blank)"}}</td>
        </tr>
                <tr>
            <th scope="row">Created at</th>
            <td>{{Carbon\Carbon::parse($pessoaJuridica->created_at)->format('d/m/Y H:i:s')}}</td>
        </tr>
        <tr>
            <th scope="row">Updated at</th>
            <td>{{Carbon\Carbon::parse($pessoaJuridica->updated_at)->format('d/m/Y H:i:s')}}</td>
        </tr>
        </tbody>
</table>

            </div>

            <div class="card-footer d-flex flex-column flex-md-row align-items-center justify-content-end">
                <a href="{{ route('pessoa_juridicas.edit', compact('pessoaJuridica')) }}" class="btn btn-info text-nowrap me-1"><i class="fa fa-edit"></i> @lang('Edit')</a>
                <form action="{{ route('pessoa_juridicas.destroy', compact('pessoaJuridica')) }}" method="POST" class="m-0 p-0">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger text-nowrap"><i class="fa fa-trash"></i> @lang('Delete')</button>
                </form>
            </div>
        </div>
    </div>
@endsection
