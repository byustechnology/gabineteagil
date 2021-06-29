@extends('gabinete::layouts.main')
@section('title', 'Ocorrências')
@section('content')

@component('gabinete::layouts.title')

<h1 class="d-block mb-3 mt-4 h3">Ocorrências</h1>

@slot('actions')
<a href="{{ route('ocorrencia.create') }}" class="btn btn-success"><i class="far fa-plus-square fa-fw mr-1"></i> Adicionar</a>
@endslot

@slot('breadcrumbs')
@include('gabinete::layouts.breadcrumbs', ['b' => Breadcrumbs::render('g-ocorrencia')])
@endslot
@endcomponent

<div class="container-fluid">

    <a href="#" data-toggle="modal" data-target="#m-search" class="btn btn-sm btn-primary"><i class="fas fa-search fa-fw mr-1"></i> Buscar</a>
    <a href="#" class="btn btn-sm btn-success"><i class="fas fa-file-csv fa-fw mr-1"></i> Exportar (CSV)</a>
    {!! request()->query() ? '<a href="' . url(request()->url()) . '" class="btn btn-sm btn-link text-danger"><i class="far fa-times-circle mr-2"></i>Cancelar filtro</a>' : null !!}

    @if( ! $ocorrencias->isEmpty())

    @foreach($ocorrencias as $ocorrencia)
    <div class="card my-3 shadow">
        <div class="card-header">
            {!! $ocorrencia->nova ? '<span class="badge badge-secondary mr-1">Nova!</span>' : null !!}
            <strong>{{ $ocorrencia->titulo }}, de {{ $ocorrencia->pessoa->titulo }}</strong>
        </div>
        <div class="card-body">
            {!! $ocorrencia->descricao !!}
            <hr>
            <strong>Aberta em {{ $ocorrencia->created_at->format('d/m/Y') }}, {{ $ocorrencia->created_at->diffForHumans() }}</strong>
        </div>
        <div class="card-footer d-flex align-items-center">
            <a href="{{ route('ocorrencia.show', ['ocorrencia' => $ocorrencia]) }}" class="btn btn-outline-primary btn-sm">Detalhes</a>
            {!! Form::open(['url' => route('ocorrencia.destroy', ['ocorrencia' => $ocorrencia]), 'method' => 'delete', 'class' => 'pl-3']) !!}
            <a data-toggle="tooltip" title="Editar" href="{{ route('ocorrencia.edit', ['ocorrencia' => $ocorrencia]) }}" class="btn btn-table-actions btn-link"><i class="far fa-edit fa-fw"></i></a>
            <button data-toggle="tooltip" title="Remover" type="sumbit" class="btn btn-table-actions text-danger btn-link"><i class="far fa-trash-alt fa-fw"></i></button>
            {!! Form::close() !!}
        </div>
    </div>
    @endforeach

    {!! $ocorrencias->links() !!}
    @else
    @include('gabinete::components.no-results')
    @endif
</div>

@include('gabinete::ocorrencia.partials.search')
@endsection