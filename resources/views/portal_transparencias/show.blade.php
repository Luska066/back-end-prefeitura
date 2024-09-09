@extends('portal_transparencias.layout')

@section('portalTransparencia.content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex flex-row align-items-center justify-content-between">
                <ol class="breadcrumb m-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ implode('/', ['','portal_transparencias']) }}"> Portal Transparencia</a></li>
                    <li class="breadcrumb-item">@lang('Portal Transparencium') #{{$portalTransparencium->id}}</li>
                </ol>

                <a href="{{ route('portal_transparencias.index', []) }}" class="btn btn-light"><i class="fa fa-caret-left"></i> Back</a>
            </div>

            <div class="card-body">
                <table class="table table-striped">
    <tbody>
    <tr>
        <th scope="row">ID:</th>
        <td>{{$portalTransparencium->id}}</td>
    </tr>
            <tr>
            <th scope="row">Titulo:</th>
            <td>{{ $portalTransparencium->titulo ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">Id Categoria Portal Transparencia:</th>
            <td>{{ $portalTransparencium->id_categoria_portal_transparencia ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">Redirect Uri:</th>
            <td>{{ Str::limit($portalTransparencium->redirect_uri, 50) ?: "(blank)"}}</td>
        </tr>
            <tr>
            <th scope="row">Icon:</th>
            <td>{{ $portalTransparencium->icon ?: "(blank)" }}</td>
        </tr>
                <tr>
            <th scope="row">Created at</th>
            <td>{{Carbon\Carbon::parse($portalTransparencium->created_at)->format('d/m/Y H:i:s')}}</td>
        </tr>
        <tr>
            <th scope="row">Updated at</th>
            <td>{{Carbon\Carbon::parse($portalTransparencium->updated_at)->format('d/m/Y H:i:s')}}</td>
        </tr>
        </tbody>
</table>

            </div>

            <div class="card-footer d-flex flex-column flex-md-row align-items-center justify-content-end">
                <a href="{{ route('portal_transparencias.edit', compact('portalTransparencium')) }}" class="btn btn-info text-nowrap me-1"><i class="fa fa-edit"></i> @lang('Edit')</a>
                <form action="{{ route('portal_transparencias.destroy', compact('portalTransparencium')) }}" method="POST" class="m-0 p-0">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger text-nowrap"><i class="fa fa-trash"></i> @lang('Delete')</button>
                </form>
            </div>
        </div>
    </div>
@endsection
