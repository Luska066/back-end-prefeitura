@extends('historias.layout')

@section('historia.content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex flex-row align-items-center justify-content-between">
                <ol class="breadcrumb m-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ implode('/', ['','historias']) }}"> Historia</a></li>
                    <li class="breadcrumb-item">@lang('Historium') #{{$historium->id}}</li>
                </ol>

                <a href="{{ route('historias.index', []) }}" class="btn btn-light"><i class="fa fa-caret-left"></i> Back</a>
            </div>

            <div class="card-body">
                <table class="table table-striped">
    <tbody>
    <tr>
        <th scope="row">ID:</th>
        <td>{{$historium->id}}</td>
    </tr>
            <tr>
            <th scope="row">Title:</th>
            <td>{{ $historium->title ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">Fundacao:</th>
            <td>{{ $historium->fundacao ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">Aniversario:</th>
            <td>{{ $historium->aniversario ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">Gentilico:</th>
            <td>{{ $historium->gentilico ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">Populacao:</th>
            <td>{{ $historium->populacao ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">Area:</th>
            <td>{{ $historium->area ?: "(blank)" }}</td>
        </tr>
            <tr>
            <th scope="row">Content:</th>
            <td>{{ Str::limit($historium->content, 50) ?: "(blank)"}}</td>
        </tr>
            <tr>
            <th scope="row">Image:</th>
            <td>{{ $historium->image ?: "(blank)" }}</td>
        </tr>
                <tr>
            <th scope="row">Created at</th>
            <td>{{Carbon\Carbon::parse($historium->created_at)->format('d/m/Y H:i:s')}}</td>
        </tr>
        <tr>
            <th scope="row">Updated at</th>
            <td>{{Carbon\Carbon::parse($historium->updated_at)->format('d/m/Y H:i:s')}}</td>
        </tr>
        </tbody>
</table>

            </div>

            <div class="card-footer d-flex flex-column flex-md-row align-items-center justify-content-end">
                <a href="{{ route('historias.edit', compact('historium')) }}" class="btn btn-info text-nowrap me-1"><i class="fa fa-edit"></i> @lang('Edit')</a>
                <form action="{{ route('historias.destroy', compact('historium')) }}" method="POST" class="m-0 p-0">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger text-nowrap"><i class="fa fa-trash"></i> @lang('Delete')</button>
                </form>
            </div>
        </div>
    </div>
@endsection
