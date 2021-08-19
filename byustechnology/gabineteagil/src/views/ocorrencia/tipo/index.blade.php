@extends('gabinete::layouts.main')
@section('title', 'Tipos de ocorrência')
@section('content')

    @component('gabinete::layouts.title')
        
        <h1 class="d-block mb-3 mt-4 h3">Tipos de ocorrência</h1>

        @slot('actions')
            <a href="{{ route('ocorrencia.tipo.create') }}" class="btn btn-success"><i class="far fa-plus-square fa-fw mr-1"></i> Adicionar</a>
        @endslot

        @slot('breadcrumbs')
            @include('gabinete::layouts.breadcrumbs', ['b' => Breadcrumbs::render('g-ocorrencia-tipo')])
        @endslot
    @endcomponent

    <div class="container-fluid">

        <a href="#" data-toggle="modal" data-target="#m-search" class="btn btn-primary mr-2"><i class="fas fa-search fa-fw mr-2"></i> Buscar</a>
        {!! request()->query() ? '<a href="' . url(request()->url()) . '" class="btn btn-outline-danger"><i class="far fa-times-circle mr-2"></i>Cancelar filtro</a>' : null !!}

        @component('ui::card')
            @if($tipos->count())
                <div class="table-responsive mt-3">
                    <table class="table table-nowrap">
                        <thead>
                            <tr>
                                <th>Título</th>
                                <th>Adicionado em</th>
                                <th class="table-actions">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tipos as $tipo)
                                <tr>
                                    <td>
                                        <a href="{{ url($tipo->path()) }}"><strong>{{ $tipo->titulo }}</strong></a><br>
                                        <small class="text-muted">{{ Str::limit($tipo->descricao, 100) }}</small>
                                    </td>
                                    <td>
                                        {{ $tipo->created_at->format('d/m/Y') }}<br>
                                        <small class="text-muted">{{ $tipo->created_at->diffForHumans() }}</small>
                                    </td>
                                    <td class="table-actions">
                                        {!! Form::open(['url' => route('ocorrencia.tipo.destroy', ['tipo' => $tipo]), 'method' => 'delete']) !!}
                                            <a data-toggle="tooltip" title="Editar" href="{{ route('ocorrencia.tipo.edit', ['tipo' => $tipo]) }}" class="btn btn-table-actions btn-link"><i class="far fa-edit fa-fw"></i></a>
                                            <button data-toggle="tooltip" title="Remover" type="sumbit" class="btn btn-table-actions text-danger btn-link confirm-delete"><i class="far fa-trash-alt fa-fw"></i></button>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            {!! $tipos->links() !!}

            @else
                @include('ui::no-results')
            @endif
        @endcomponent

    @include('gabinete::ocorrencia.tipo.partials.search')
@endsection