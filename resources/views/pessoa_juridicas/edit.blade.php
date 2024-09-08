@extends('pessoa_juridicas.layout')

@section('pessoaJuridica.content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex flex-row align-items-center justify-content-between">
                <ol class="breadcrumb m-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ implode('/', ['','pessoa_juridicas']) }}"> Pessoa
                            Juridica</a></li>
                    <li class="breadcrumb-item">@lang('Edit Pessoa Juridica') #{{$pessoaJuridica->id}}</li>
                </ol>
            </div>
            <div class="card-body">
                <form action="{{ route('pessoa_juridica.update', $pessoaJuridica->id) }}" method="POST" class="m-0 p-0">
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome:</label>
                            <input type="text" name="nome" id="nome" class="form-control"
                                   value="{{@old('nome', $pessoaJuridica->nome)}}"/>
                            @if($errors->has('nome'))
                                <div class='error small text-danger'>{{$errors->first('nome')}}</div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" name="email" id="email" class="form-control"
                                   value="{{@old('email', $pessoaJuridica->email)}}"/>
                            @if($errors->has('email'))
                                <div class='error small text-danger'>{{$errors->first('email')}}</div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="horario" class="form-label">Horario:</label>
                            <textarea name="horario" id="horario"
                                      class="form-control">{{@old('horario', $pessoaJuridica->horario)}}</textarea>
                            @if($errors->has('horario'))
                                <div class='error small text-danger'>{{$errors->first('horario')}}</div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="endereco" class="form-label">Endereco:</label>
                            <textarea name="endereco" id="endereco"
                                      class="form-control">{{@old('endereco', $pessoaJuridica->endereco)}}</textarea>
                            @if($errors->has('endereco'))
                                <div class='error small text-danger'>{{$errors->first('endereco')}}</div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="competencias" class="form-label">Competencias:</label>
                            <textarea name="competencias" id="competencias"
                                      class="form-control">{{@old('competencias', $pessoaJuridica->competencias)}}</textarea>
                            @if($errors->has('competencias'))
                                <div class='error small text-danger'>{{$errors->first('competencias')}}</div>
                            @endif
                        </div>

                    </div>
                    <div class="card-footer">
                        <div class="d-flex flex-row align-items-center justify-content-between">
                            <a href="{{ route('pessoa_juridica.index', []) }}" class="btn btn-light">Cancel</a>
                            <button type="submit" class="btn btn-primary">@lang('Update Pessoa Juridica')</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
