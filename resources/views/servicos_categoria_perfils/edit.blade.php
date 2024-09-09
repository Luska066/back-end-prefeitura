@extends('servicos_categoria_perfils.layout')

@section('servicosCategoriaPerfil.content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex flex-row align-items-center justify-content-between">
                <ol class="breadcrumb m-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ implode('/', ['','servicos_categoria_perfils']) }}"> Servicos Categoria Perfil</a></li>
                    <li class="breadcrumb-item">@lang('Edit Servicos Categoria Perfil') #{{$servicosCategoriaPerfil->id}}</li>
                </ol>
            </div>
            <div class="card-body">
                <form action="{{ route('servicos_categoria_perfils.update', compact('servicosCategoriaPerfil')) }}" method="POST" class="m-0 p-0">
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                        <div class="mb-3">
        <label for="nome" class="form-label">Nome:</label>
        <input type="text" name="nome" id="nome" class="form-control" value="{{@old('nome', $servicosCategoriaPerfil->nome)}}" />
        @if($errors->has('nome'))
			<div class='error small text-danger'>{{$errors->first('nome')}}</div>
		@endif
    </div>

                    </div>
                    <div class="card-footer">
                        <div class="d-flex flex-row align-items-center justify-content-between">
                            <a href="{{ route('servicos_categoria_perfils.index', []) }}" class="btn btn-light">Cancel</a>
                            <button type="submit" class="btn btn-primary">@lang('Update Servicos Categoria Perfil')</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
