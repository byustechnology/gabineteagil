@extends('gabinete::layouts.main')
@section('title', 'Orgãos responsáveis')
@section('content')

    @component('gabinete::layouts.title')
        
        <h1 class="d-block mb-3 mt-4 h3">Orgãos responsáveis</h1>

        @slot('actions')
            <a href="{{ route('orgao.create') }}" class="btn btn-success"><i class="far fa-plus-square fa-fw mr-1"></i> Adicionar</a>
        @endslot

        @slot('breadcrumbs')
            @include('gabinete::layouts.breadcrumbs', ['b' => Breadcrumbs::render('g-orgao')])
        @endslot
    @endcomponent

    <div class="container-fluid">

        <a href="#" data-toggle="modal" data-target="#m-search" class="btn btn-primary mr-2"><i class="fas fa-search fa-fw mr-2"></i> Buscar</a>
        {!! request()->query() ? '<a href="' . url(request()->url()) . '" class="btn btn-outline-danger"><i class="far fa-times-circle mr-2"></i>Cancelar filtro</a>' : null !!}

        @component('ui::card')
            @if($orgaos->count())
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
                            @foreach($orgaos as $orgao)
                                <tr>
                                    <td>
                                        <a href="{{ url($orgao->path()) }}"><strong>{{ $orgao->titulo }}</strong></a><br>
                                        <small class="text-muted">{{ Str::limit($orgao->descricao, 100) }}</small>
                                    </td>
                                    <td><i data-toggle="tooltip" title="{{ $orgao->cor }}" class="fas fa-square fa-fw mr-1 shadow-sm" style="color: {{ $orgao->cor }}"></i></td>
                                    <td class="text-right">{{ $orgao->ocorrencias_count }}</td>
                                    <td class="table-actions">
                                        {!! Form::open(['url' => route('orgao.destroy', ['orgao' => $orgao->id]), 'method' => 'delete']) !!}
                                            <a data-toggle="tooltip" title="Editar" href="{{ route('orgao.edit', ['orgao' => $orgao]) }}" class="btn btn-table-actions btn-link"><i class="far fa-edit fa-fw"></i></a>
                                            <button data-toggle="tooltip" title="Remover" type="sumbit" class="btn btn-table-actions text-danger btn-link"><i class="far fa-trash-alt fa-fw"></i></button>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            {!! $orgaos->links() !!}

            @else
                @include('ui::no-results')
            @endif
        @endcomponent

    @include('gabinete::orgao.partials.search')
@endsection