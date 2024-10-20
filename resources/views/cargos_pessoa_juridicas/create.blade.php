@extends('cargos_pessoa_juridicas.layout')

@section('cargosPessoaJuridica.content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex flex-row align-items-center justify-content-between">
                <ol class="breadcrumb m-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ implode('/', ['','cargos_pessoa_juridicas']) }}"> Cargos Pessoa Juridica</a></li>
                    <li class="breadcrumb-item">@lang('Create new')</li>
                </ol>
            </div>

            <div class="card-body">
                <form action="{{ route('cargos_pessoa_juridica.store', []) }}" method="POST" class="m-0 p-0">
                    <div class="card-body">
                        @csrf
                        <div class="mb-3">
        <label for="nome" class="form-label">Nome:</label>
        <input type="text" name="nome" id="nome" class="form-control" value="{{@old('nome')}}" required/>
        @if($errors->has('nome'))
			<div class='error small text-danger'>{{$errors->first('nome')}}</div>
		@endif
    </div>

                    </div>

                    <div class="card-footer">
                        <div class="d-flex flex-row align-items-center justify-content-between">
                            <a href="{{ route('cargos_pessoa_juridica.index', []) }}" class="btn btn-light">@lang('Cancel')</a>
                            <button type="submit" class="btn btn-primary">@lang('Create new Cargos Pessoa Juridica')</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
