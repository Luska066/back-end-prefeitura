@extends('portal_transparencias.layout')

@section('portalTransparencia.content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex flex-row align-items-center justify-content-between">
                <ol class="breadcrumb m-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ implode('/', ['','portal_transparencias']) }}"> Portal
                            Transparencia</a></li>
                    <li class="breadcrumb-item">@lang('Create new')</li>
                </ol>
            </div>

            <div class="card-body">
                <form action="{{ route('portal_transparencia.store', []) }}" method="POST" class="m-0 p-0">
                    <div class="card-body">
                        @csrf
                        <div class="mb-3">
                            <label for="titulo" class="form-label">Titulo:</label>
                            <input type="text" name="titulo" id="titulo" class="form-control"
                                   value="{{@old('titulo')}}"/>
                            @if($errors->has('titulo'))
                                <div class='error small text-danger'>{{$errors->first('titulo')}}</div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="id_categoria_portal_transparencia" class="form-label">Categoria:</label>
                            <select type="number" name="id_categoria_portal_transparencia"
                                    id="id_categoria_portal_transparencia" class="form-control"
                                    value="{{@old('id_categoria_portal_transparencia')}}">
                                @foreach(\App\Models\CategoriaPortalTransparencium::all() as $categoria)
                                    <option value="{{$categoria->id}}">{{$categoria->nome}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('id_categoria_portal_transparencia'))
                                <div
                                    class='error small text-danger'>{{$errors->first('id_categoria_portal_transparencia')}}</div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="redirect_uri" class="form-label">Redirect Uri:</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon3">https://facebook.com/</span>
                                </div>
                                <input name="redirect_uri" id="redirect_uri" type="text" class="form-control"
                                       aria-describedby="basic-addon3">
                            </div>
                            @if($errors->has('redirect_uri'))
                                <div class='error small text-danger'>{{$errors->first('redirect_uri')}}</div>
                            @endif
                        </div>
                        <label for="redirect_uri" class="form-label">Icon:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon3">
                                     <i id="icon-name" class="fas fa-users-cog"></i>
                                </span>
                            </div>
                            <input name="icon" id="icon" type="text" class="form-control"
                                   aria-describedby="basic-addon3">
                            @if($errors->has('icon'))
                                <div class='error small text-danger'>{{$errors->first('icon')}}</div>
                            @endif
                            <script>
                                document.getElementById('icon').addEventListener('change', function () {
                                    document.getElementById('icon-name').setAttribute('class', "fas fa-"+this.value);
                                    // document.getElementById('icon').value = this.value;
                                });
                            </script>
                        </div>

                    </div>

                    <div class="card-footer">
                        <div class="d-flex flex-row align-items-center justify-content-between">
                            <a href="{{ route('portal_transparencia.index', []) }}"
                               class="btn btn-light">@lang('Cancel')</a>
                            <button type="submit"
                                    class="btn btn-primary">@lang('Create new Portal Transparencium')</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
