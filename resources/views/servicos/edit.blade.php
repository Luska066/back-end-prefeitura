@extends('servicos.layout')

@section('servicos.content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex flex-row align-items-center justify-content-between">
                <ol class="breadcrumb m-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ implode('/', ['','servicos']) }}"> Servicos</a></li>
                    <li class="breadcrumb-item">@lang('Edit Servico') #{{$servico->id}}</li>
                </ol>
            </div>
            <div class="card-body">
                <form action="{{ route('servicos.update', compact('servico')) }}" method="POST" class="m-0 p-0">
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="id_categoria_perfil" class="form-label">Id Categoria Perfil:</label>
                            <input type="number" name="id_categoria_perfil" id="id_categoria_perfil"
                                   class="form-control"
                                   value="{{@old('id_categoria_perfil', $servico->id_categoria_perfil)}}"/>
                            @if($errors->has('id_categoria_perfil'))
                                <div class='error small text-danger'>{{$errors->first('id_categoria_perfil')}}</div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="id_categoria_tipo" class="form-label">Id Categoria Tipo:</label>
                            <input type="number" name="id_categoria_tipo" id="id_categoria_tipo" class="form-control"
                                   value="{{@old('id_categoria_tipo', $servico->id_categoria_tipo)}}"/>
                            @if($errors->has('id_categoria_tipo'))
                                <div class='error small text-danger'>{{$errors->first('id_categoria_tipo')}}</div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="titulo" class="form-label">Titulo:</label>
                            <input type="text" name="titulo" id="titulo" class="form-control"
                                   value="{{@old('titulo', $servico->titulo)}}"/>
                            @if($errors->has('titulo'))
                                <div class='error small text-danger'>{{$errors->first('titulo')}}</div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="descricao" class="form-label">Descricao:</label>
                            <textarea name="descricao" id="descricao"
                                      class="form-control">{{@old('descricao', $servico->descricao)}}</textarea>
                            @if($errors->has('descricao'))
                                <div class='error small text-danger'>{{$errors->first('descricao')}}</div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="redirect_uri" class="form-label">Redirect Uri:</label>
                            <input
                                name="redirect_uri"
                                id="redirect_uri"
                                class="form-control"
                                value="{{@old('redirect_uri', $servico->redirect_uri)}}"
                            />
                            @if($errors->has('redirect_uri'))
                                <div class='error small text-danger'>{{$errors->first('redirect_uri')}}</div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="icon" class="form-label">Icon:</label>
                            <input type="text" name="icon" id="icon" class="form-control"
                                   value="{{@old('icon', $servico->icon)}}"/>
                            @if($errors->has('icon'))
                                <div class='error small text-danger'>{{$errors->first('icon')}}</div>
                            @endif
                        </div>

                    </div>
                    <div class="card-footer">
                        <div class="d-flex flex-row align-items-center justify-content-between">
                            <a href="{{ route('servicos.index', []) }}" class="btn btn-light">Cancel</a>
                            <button type="submit" class="btn btn-primary">@lang('Update Servico')</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @push('js')

        <script>
            tinymce.init({
                selector: 'textarea', // Replace this CSS selector to match the placeholder element for TinyMCE
                plugins: [
                    'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
                    'anchor', 'searchreplace', 'visualblocks', 'fullscreen',
                    'insertdatetime', 'media', 'table', 'code', 'help', 'wordcount'
                ],
                toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table',
            });
        </script>
    @endpush
@endsection
