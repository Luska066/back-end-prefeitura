@extends('categorias_noticias.layout')

@section('categoriasNoticias.content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex flex-row align-items-center justify-content-between">
                <ol class="breadcrumb m-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ implode('/', ['','categorias_noticias']) }}"> Categorias Noticias</a></li>
                    <li class="breadcrumb-item">@lang('Edit Categorias Noticia') #{{$categoriasNoticia->id}}</li>
                </ol>
            </div>
            <div class="card-body">
                <form action="{{ route('categorias_noticias.update', $categoriasNoticia->id) }}" method="POST" class="m-0 p-0">
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                        <div class="mb-3">
        <label for="nome" class="form-label">Nome:</label>
        <input type="text" name="nome" id="nome" class="form-control" value="{{@old('nome', $categoriasNoticia->nome)}}" required/>
        @if($errors->has('nome'))
			<div class='error small text-danger'>{{$errors->first('nome')}}</div>
		@endif
    </div>

                    </div>
                    <div class="card-footer">
                        <div class="d-flex flex-row align-items-center justify-content-between">
                            <a href="{{ route('categorias_noticias.index', []) }}" class="btn btn-light">Cancel</a>
                            <button type="submit" class="btn btn-primary">@lang('Update Categorias Noticia')</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
