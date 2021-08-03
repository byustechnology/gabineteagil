@extends('gabinete::layouts.main')
@section('title', 'Assuntos')
@section('content')

@component('gabinete::layouts.title')

<h1 class="d-block mb-3 mt-4 h3">Assuntos</h1>

@slot('actions')
<a href="{{ route('assunto.create') }}" class="btn btn-success"><i class="far fa-plus-square fa-fw mr-1"></i> Adicionar</a>
@endslot

@slot('breadcrumbs')
@include('gabinete::layouts.breadcrumbs', ['b' => Breadcrumbs::render('g-assunto')])
@endslot
@endcomponent

<div class="container-fluid">

    <a href="#" data-toggle="modal" data-target="#m-search" class="btn btn-primary mr-2"><i class="fas fa-search fa-fw mr-2"></i> Buscar</a>
    {!! request()->query() ? '<a href="' . url(request()->url()) . '" class="btn btn-outline-danger"><i class="far fa-times-circle mr-2"></i>Cancelar filtro</a>' : null !!}

    @component('ui::card')
        @if($assuntos->count())
            <div class="table-responsive mt-3">
                <table class="table table-nowrap">
                    <thead>
                        <tr>
                            <th>Título</th>
                            <th>Cor</th>
                            <th class="text-right">Nº Ocorrências</th>
                            <th class="table-actions">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($assuntos as $assunto)
                        <tr>
                            <td>
                                <a href="{{ url($assunto->path()) }}"><strong>{{ $assunto->titulo }}</strong></a><br>
                                <small class="text-muted">{{ Str::limit($assunto->descricao, 100) }}</small>
                            </td>
                            <td><i data-toggle="tooltip" title="{{ $assunto->cor }}" class="fas fa-square fa-fw mr-1 shadow-sm" style="color: {{ $assunto->cor }}"></i></td>
                            <td class="text-right">{{ $assunto->ocorrencias_count }}</td>
                            <td class="table-actions">
                                {!! Form::open(['url' => route('assunto.destroy', ['assunto' => $assunto->id]), 'method' => 'delete']) !!}
                                <a data-toggle="tooltip" title="Editar" href="{{ route('assunto.edit', ['assunto' => $assunto]) }}" class="btn btn-table-actions btn-link"><i class="far fa-edit fa-fw"></i></a>
                                <button data-toggle="tooltip" title="Remover" type="sumbit" class="btn btn-table-actions text-danger btn-link"><i class="far fa-trash-alt fa-fw"></i></button>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {!! $assuntos->links() !!}
        @else
            @include('ui::no-results')
        @endif
    @endcomponent
</div>

@include('gabinete::assunto.partials.search')
@endsection