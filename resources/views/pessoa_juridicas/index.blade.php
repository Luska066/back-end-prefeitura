@extends('pessoa_juridicas.layout')

@section('pessoaJuridica.content')
    <div class="container">
        <h1 class="py-4 font-weight-bold">Criar Pessoa Jurídica</h1>
        <div class="card">
            <div class="card-body">
                <table class="table table-striped table-responsive-lg table-hover">
                    <thead role="rowgroup">
                    <tr role="row">
                        <th role='columnheader'>Nome</th>
                        <th role='columnheader'>Email</th>
                        <th role='columnheader'>Horario</th>
                        <th role='columnheader'>Endereco</th>
                        <th role='columnheader'>Competencias</th>
                        <th scope="col" data-label="Actions">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($pessoaJuridicas as $pessoaJuridica)
                        <tr>
                            <td data-label="Nome">{{ $pessoaJuridica->nome ?: "(blank)" }}</td>
                            <td data-label="Email">{{ $pessoaJuridica->email ?: "(blank)" }}</td>
                            <td data-label="Horario">{{ Str::limit($pessoaJuridica->horario, 50) ?: "(blank)"}}</td>
                            <td data-label="Endereco">{{ Str::limit($pessoaJuridica->endereco, 50) ?: "(blank)"}}</td>
                            <td data-label="Competencias">{{ Str::limit($pessoaJuridica->competencias, 50) ?: "(blank)"}}</td>

                            <td data-label="Actions:" class="text-nowrap">
                                <a href="{{route('pessoa_juridica.show', $pessoaJuridica->id)}}" type="button"
                                   class="btn btn-primary btn-sm me-1">@lang('Show')</a>
                                <div class="btn-group btn-group-sm">
                                    <button type="button" class="btn btn-light dropdown-toggle"
                                            data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-cog"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item"
                                               href="{{route('pessoa_juridica.edit', $pessoaJuridica->id)}}">@lang('Edit')</a>
                                        </li>
                                        <li>
                                            <form
                                                action="{{route('pessoa_juridica.destroy', $pessoaJuridica->id)}}"
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

                {{ $pessoaJuridicas->withQueryString()->links() }}
            </div>
            <div class="text-center my-2">
                <a href="{{ route('pessoa_juridica.create', []) }}" class="btn btn-primary"><i
                        class="fa fa-plus"></i> @lang('Create new Pessoa Juridica')</a>
            </div>
        </div>
    </div>
@endsection
