@extends('estruturas.layout')

@section('estrutura.content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex flex-row align-items-center justify-content-between">
                <ol class="breadcrumb m-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ implode('/', ['','estruturas']) }}"> Estrutura</a></li>
                    <li class="breadcrumb-item">@lang('Create new')</li>
                </ol>
            </div>

            <div class="card-body">
                <form action="{{ route('estrutura.store', []) }}" method="POST" class="m-0 p-0">
                    <div class="card-body">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Título da Estrutura Organizacional:</label>
                            <input type="text" name="title" id="title" class="form-control" value="{{@old('title')}}"
                                   required/>
                            @if($errors->has('title'))
                                <div class='error small text-danger'>{{$errors->first('title')}}</div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="id_categoria" class="form-label">Categoria:</label>
                            <select type="number" name="id_categoria" id="id_categoria" class="form-control"
                                   value="{{@old('id_categoria')}}">
                                @foreach(\App\Models\CategoriaEstruturaOrganizacional::all() as $categoria)
                                    <option value="{{$categoria->id}}">{{ $categoria->nome }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('id_categoria'))
                                <div class='error small text-danger'>{{$errors->first('id_categoria')}}</div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="id_pessoa_juridica" class="form-label">Pessoa Jurídica:</label>
                            <select type="number" name="id_pessoa_juridica" id="id_pessoa_juridica" class="form-control"
                                   value="{{@old('id_pessoa_juridica')}}">
                                @foreach(\App\Models\PessoaJuridica::all() as $categoria)
                                    <option value="{{$categoria->id}}">{{ $categoria->nome }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('id_pessoa_juridica'))
                                <div class='error small text-danger'>{{$errors->first('id_pessoa_juridica')}}</div>
                            @endif
                        </div>


                    </div>

                    <div class="card-footer">
                        <div class="d-flex flex-row align-items-center justify-content-between">
                            <a href="{{ route('estrutura.index', []) }}" class="btn btn-light">@lang('Cancel')</a>
                            <button type="submit" class="btn btn-primary">@lang('Create new Estrutura')</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
