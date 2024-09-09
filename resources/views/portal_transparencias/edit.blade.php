@extends('portal_transparencias.layout')

@section('portalTransparencia.content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex flex-row align-items-center justify-content-between">
                <ol class="breadcrumb m-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ implode('/', ['','portal_transparencias']) }}"> Portal Transparencia</a></li>
                    <li class="breadcrumb-item">@lang('Edit Portal Transparencium') #{{$portalTransparencium->id}}</li>
                </ol>
            </div>
            <div class="card-body">
                <form action="{{ route('portal_transparencias.update', compact('portalTransparencium')) }}" method="POST" class="m-0 p-0">
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                        <div class="mb-3">
        <label for="titulo" class="form-label">Titulo:</label>
        <input type="text" name="titulo" id="titulo" class="form-control" value="{{@old('titulo', $portalTransparencium->titulo)}}" />
        @if($errors->has('titulo'))
			<div class='error small text-danger'>{{$errors->first('titulo')}}</div>
		@endif
    </div>
    <div class="mb-3">
        <label for="id_categoria_portal_transparencia" class="form-label">Id Categoria Portal Transparencia:</label>
        <input type="number" name="id_categoria_portal_transparencia" id="id_categoria_portal_transparencia" class="form-control" value="{{@old('id_categoria_portal_transparencia', $portalTransparencium->id_categoria_portal_transparencia)}}" />
        @if($errors->has('id_categoria_portal_transparencia'))
			<div class='error small text-danger'>{{$errors->first('id_categoria_portal_transparencia')}}</div>
		@endif
    </div>
    <div class="mb-3">
        <label for="redirect_uri" class="form-label">Redirect Uri:</label>
        <textarea name="redirect_uri" id="redirect_uri" class="form-control" >{{@old('redirect_uri', $portalTransparencium->redirect_uri)}}</textarea>
        @if($errors->has('redirect_uri'))
			<div class='error small text-danger'>{{$errors->first('redirect_uri')}}</div>
		@endif
    </div>
    <div class="mb-3">
        <label for="icon" class="form-label">Icon:</label>
        <input type="text" name="icon" id="icon" class="form-control" value="{{@old('icon', $portalTransparencium->icon)}}" />
        @if($errors->has('icon'))
			<div class='error small text-danger'>{{$errors->first('icon')}}</div>
		@endif
    </div>

                    </div>
                    <div class="card-footer">
                        <div class="d-flex flex-row align-items-center justify-content-between">
                            <a href="{{ route('portal_transparencias.index', []) }}" class="btn btn-light">Cancel</a>
                            <button type="submit" class="btn btn-primary">@lang('Update Portal Transparencium')</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
