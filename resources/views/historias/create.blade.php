@extends('historias.layout')

@section('historia.content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex flex-row align-items-center justify-content-between">
                <ol class="breadcrumb m-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ implode('/', ['', 'historias']) }}"> Historia</a></li>
                    <li class="breadcrumb-item">@lang('Create new')</li>
                </ol>
            </div>

            <div class="card-body">
                <form action="{{ route('historia.store') }}" method="POST" class="m-0 p-0">
                    <div class="card-body">
                        @csrf
                        @method('POST')
                        <div class="mb-3">
                            <label for="title" class="form-label">Title:</label>
                            <input type="text" name="title" id="title" class="form-control"
                                value="{{ @old('title') }}"  />
                            @if ($errors->has('title'))
                                <div class='error small text-danger'>{{ $errors->first('title') }}</div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="fundacao" class="form-label">Fundacao:</label>
                            <input type="text" name="fundacao" id="fundacao" class="form-control"
                                value="{{ @old('fundacao') }}"  />
                            @if ($errors->has('fundacao'))
                                <div class='error small text-danger'>{{ $errors->first('fundacao') }}</div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="aniversario" class="form-label">Aniversario:</label>
                            <input type="text" name="aniversario" id="aniversario" class="form-control"
                                value="{{ @old('aniversario') }}"  />
                            @if ($errors->has('aniversario'))
                                <div class='error small text-danger'>{{ $errors->first('aniversario') }}</div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="gentilico" class="form-label">Gentilico:</label>
                            <input type="text" name="gentilico" id="gentilico" class="form-control"
                                value="{{ @old('gentilico') }}"  />
                            @if ($errors->has('gentilico'))
                                <div class='error small text-danger'>{{ $errors->first('gentilico') }}</div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="populacao" class="form-label">Populacao:</label>
                            <input type="text" name="populacao" id="populacao" class="form-control"
                                value="{{ @old('populacao') }}"  />
                            @if ($errors->has('populacao'))
                                <div class='error small text-danger'>{{ $errors->first('populacao') }}</div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="area" class="form-label">Area:</label>
                            <input type="text" name="area" id="area" class="form-control"
                                value="{{ @old('area') }}"  />
                            @if ($errors->has('area'))
                                <div class='error small text-danger'>{{ $errors->first('area') }}</div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="content" class="form-label">Content:</label>
                            <textarea name="content" id="content" class="form-control" >{{ @old('content') }}</textarea>
                            @if ($errors->has('content'))
                                <div class='error small text-danger'>{{ $errors->first('content') }}</div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Image:</label>
                            <input type="text" name="image" id="image" class="form-control"
                                value="{{ @old('image') }}"  />
                            @if ($errors->has('image'))
                                <div class='error small text-danger'>{{ $errors->first('image') }}</div>
                            @endif
                        </div>

                    </div>

                    <div class="card-footer">
                        <div class="d-flex flex-row align-items-center justify-content-between">
                            <a href="{{ route('historia.index', []) }}" class="btn btn-light">@lang('Cancel')</a>
                            <button type="submit" class="btn btn-primary">@lang('Create new Historium')</button>
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
                plugins: 'code table lists',
                toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table',

            });
        </script>
    @endpush
@endsection
