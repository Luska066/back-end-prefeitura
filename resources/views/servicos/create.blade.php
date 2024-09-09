@extends('servicos.layout')

@section('servicos.content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex flex-row align-items-center justify-content-between">
                <ol class="breadcrumb m-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ implode('/', ['','servicos']) }}"> Servicos</a></li>
                    <li class="breadcrumb-item">@lang('Create new')</li>
                </ol>
            </div>

            <div class="card-body">
                <form action="{{ route('servicos.store', []) }}" method="POST" class="m-0 p-0">
                    <div class="card-body">
                        @csrf
                        <div class="mb-3">
                            <label for="id_categoria_perfil" class="form-label">Id Categoria Perfil:</label>
                            <select type="number" name="id_categoria_perfil" id="id_categoria_perfil"
                                   class="form-control" value="{{@old('id_categoria_perfil')}}">
                                @foreach(\App\Models\ServicosCategoriaPerfil::all() as $categoria_perfil)
                                    <option value="{{$categoria_perfil->id}}">
                                        {{ $categoria_perfil->nome }}
                                    </option>
                                @endforeach
                            </select>
                            @if($errors->has('id_categoria_perfil'))
                                <div class='error small text-danger'>{{$errors->first('id_categoria_perfil')}}</div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="id_categoria_tipo" class="form-label">Id Categoria Tipo:</label>
                            <select type="number" name="id_categoria_tipo" id="id_categoria_tipo" class="form-control"
                                   value="{{@old('id_categoria_tipo')}}">
                                @foreach(\App\Models\ServicosCategoriaTipo::all() as $categoria_tipo)
                                    <option value="{{$categoria_tipo->id}}">
                                        {{ $categoria_tipo->nome }}
                                    </option>
                                @endforeach
                            </select>
                            @if($errors->has('id_categoria_tipo'))
                                <div class='error small text-danger'>{{$errors->first('id_categoria_tipo')}}</div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="titulo" class="form-label">Titulo:</label>
                            <input type="text" name="titulo" id="titulo" class="form-control"
                                   value="{{@old('titulo')}}"/>
                            @if($errors->has('titulo'))
                                <div class='error small text-danger'>{{$errors->first('titulo')}}</div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="descricao" class="form-label">Descricao:</label>
                            <textarea name="descricao" id="descricao"
                                      class="form-control">{{@old('descricao')}}</textarea>
                            @if($errors->has('descricao'))
                                <div class='error small text-danger'>{{$errors->first('descricao')}}</div>
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
                            <a href="{{ route('servicos.index', []) }}" class="btn btn-light">@lang('Cancel')</a>
                            <button type="submit" class="btn btn-primary">@lang('Create new Servico')</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
