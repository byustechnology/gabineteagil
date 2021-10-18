@extends('gabinete::layouts.main')
@section('title', 'Etapas')
@section('content')

    @component('gabinete::layouts.title')
        
        <h1 class="d-block mb-3 mt-4 h3">Etapas</h1>

        @slot('actions')
            <a href="{{ route('etapa.create') }}" class="btn btn-success"><i class="far fa-plus-square fa-fw mr-1"></i> Adicionar</a>
        @endslot

        @slot('breadcrumbs')
            @include('gabinete::layouts.breadcrumbs', ['b' => Breadcrumbs::render('g-etapa')])
        @endslot
    @endcomponent

    <div class="container-fluid">

        <a href="#" data-toggle="modal" data-target="#m-search" class="btn btn-primary mr-2"><i class="fas fa-search fa-fw mr-2"></i> Buscar</a>
        {!! request()->query() ? '<a href="' . url(request()->url()) . '" class="btn btn-outline-danger"><i class="far fa-times-circle mr-2"></i>Cancelar filtro</a>' : null !!}

        @component('ui::card')
            @if($etapas->count())
                <div class="table-responsive">
                    <table class="table table-nowrap">
                        <thead>
                            <tr>
                                <th>Título</th>
                                <th>Ordem</th>
                                <th>Cor</th>
                                <th class="text-center">Conclui</th>
                                <th class="text-center">Cancela</th>
                                <th>Cód</th>
                                <th class="table-actions">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($etapas as $etapa)
                                <tr>
                                    <td><a href="{{ url($etapa->path()) }}"><strong>{{ $etapa->titulo }}</strong></a></td>
                                    <td>{{ $etapa->ordem }}</td>
                                    <td><i class="fas fa-square fa-fw mr-2" style="color: {{ $etapa->cor }}"></i>{{ $etapa->cor }}</td>
                                    <td class="text-center">{!! $etapa->conclui ? '<i data-toggle="tooltip" title="Ocorrências nesta etapa serão concluidas automaticamente" class="far fa-check-circle fa-fw text-success"></i>' : '<i class="far fa-circle fa-fw text-muted"></i>' !!}</td>
                                    <td class="text-center">{!! $etapa->cancela ? '<i data-toggle="tooltip" title="Ocorrências nesta etapa serão canceladas automaticamente" class="far fa-check-circle fa-fw text-success"></i>' : '<i class="far fa-circle fa-fw text-muted"></i>' !!}</td>
                                    <td>{{ $etapa->codigo }}</td>
                                    <td class="table-actions">
                                        {!! Form::open(['url' => route('etapa.destroy', ['etapa' => $etapa]), 'method' => 'delete']) !!}
                                            <a data-toggle="tooltip" title="Editar" href="{{ route('etapa.edit', ['etapa' => $etapa]) }}" class="btn btn-table-actions btn-link"><i class="far fa-edit fa-fw"></i></a>
                                            <button data-toggle="tooltip" title="Remover" type="sumbit" class="btn btn-table-actions text-danger btn-link confirm-delete"><i class="far fa-trash-alt fa-fw"></i></button>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {!! $etapas->links() !!}

            @else
                @include('ui::no-results')
            @endif
        @endcomponent
    </div>


<!-- Modals -->
@include('gabinete::etapa.partials.search')

@endsection