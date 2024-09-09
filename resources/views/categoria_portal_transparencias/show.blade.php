@extends('categoria_portal_transparencias.layout')

@section('categoriaPortalTransparencia.content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex flex-row align-items-center justify-content-between">
                <ol class="breadcrumb m-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ implode('/', ['','categoria_portal_transparencias']) }}"> Categoria Portal Transparencia</a></li>
                    <li class="breadcrumb-item">@lang('Categoria Portal Transparencium') #{{$categoriaPortalTransparencium->id}}</li>
                </ol>

                <a href="{{ route('categoria_portal_transparencias.index', []) }}" class="btn btn-light"><i class="fa fa-caret-left"></i> Back</a>
            </div>

            <div class="card-body">
                <table class="table table-striped">
    <tbody>
    <tr>
        <th scope="row">ID:</th>
        <td>{{$categoriaPortalTransparencium->id}}</td>
    </tr>
            <tr>
            <th scope="row">Nome:</th>
            <td>{{ $categoriaPortalTransparencium->nome ?: "(blank)" }}</td>
        </tr>
                <tr>
            <th scope="row">Created at</th>
            <td>{{Carbon\Carbon::parse($categoriaPortalTransparencium->created_at)->format('d/m/Y H:i:s')}}</td>
        </tr>
        <tr>
            <th scope="row">Updated at</th>
            <td>{{Carbon\Carbon::parse($categoriaPortalTransparencium->updated_at)->format('d/m/Y H:i:s')}}</td>
        </tr>
        </tbody>
</table>

            </div>

            <div class="card-footer d-flex flex-column flex-md-row align-items-center justify-content-end">
                <a href="{{ route('categoria_portal_transparencias.edit', compact('categoriaPortalTransparencium')) }}" class="btn btn-info text-nowrap me-1"><i class="fa fa-edit"></i> @lang('Edit')</a>
                <form action="{{ route('categoria_portal_transparencias.destroy', compact('categoriaPortalTransparencium')) }}" method="POST" class="m-0 p-0">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger text-nowrap"><i class="fa fa-trash"></i> @lang('Delete')</button>
                </form>
            </div>
        </div>
    </div>
@endsection