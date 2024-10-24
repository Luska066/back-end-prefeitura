@extends('noticias.layout')

@section('noticias.content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex flex-row align-items-center justify-content-between">
                <ol class="breadcrumb m-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ implode('/', ['','noticias']) }}"> Noticias</a></li>
                    <li class="breadcrumb-item">@lang('Create new')</li>
                </ol>
            </div>

            <div class="card-body">
                <form action="{{ route('noticias.store', []) }}" method="POST" class="m-0 p-0">
                    <div class="card-body">
                        @csrf
                        <div class="mb-3">
        <label for="titulo" class="form-label">Titulo:</label>
        <input type="text" name="titulo" id="titulo" class="form-control" value="{{@old('titulo')}}" />
        @if($errors->has('titulo'))
			<div class='error small text-danger'>{{$errors->first('titulo')}}</div>
		@endif
    </div>
    <div class="mb-3">
        <label for="image_url" class="form-label">Image Url:</label>
        <input type="text" name="image_url" id="image_url" class="form-control" value="{{@old('image_url')}}" />
        @if($errors->has('image_url'))
			<div class='error small text-danger'>{{$errors->first('image_url')}}</div>
		@endif
    </div>

    <div class="form-group">
        <label for="categorias">Categorias</label>
        <select name="categorias[]" id="categorias" class="form-control" multiple>
            @foreach($categorias as $categoria)
                <option value="{{ $categoria->id }}" 
                    @if(isset($noticia) && $noticia->categorias->contains($categoria->id)) selected @endif>
                    {{ $categoria->nome }}
                </option>
            @endforeach
        </select>
    </div>
    
    <div class="mb-3">
        <label for="arquivo" class="form-label">Documento:</label>
        <input type="file" name="arquivo[]" id="arquivo" class="form-control" multiple>
        @if($errors->has('arquivo'))
            <div class='error small text-danger'>{{$errors->first('arquivo')}}</div>
        @endif
    </div>
    

    <div class="mb-3">
        <label for="conteudo" class="form-label">Conteudo:</label>
        <textarea name="conteudo" id="conteudo" class="form-control" >{{@old('conteudo')}}</textarea>
        @if($errors->has('conteudo'))
			<div class='error small text-danger'>{{$errors->first('conteudo')}}</div>
		@endif
    </div>

                    </div>

                    <div class="card-footer">
                        <div class="d-flex flex-row align-items-center justify-content-between">
                            <a href="{{ route('noticias.index', []) }}" class="btn btn-light">@lang('Cancel')</a>
                            <button type="submit" class="btn btn-primary">@lang('Create new Noticia')</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
