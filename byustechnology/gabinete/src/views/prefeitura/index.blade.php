@extends('gabinete::layouts.main')
@section('title', 'Gestão de prefeituras')
@section('content')

    @component('gabinete::layouts.title')

        <h1 class="d-block mb-3 mt-4 h3">Prefeituras e acessos</h1>

        @slot('actions')
            <a href="{{ route('prefeitura.create') }}" class="btn btn-success"><i class="far fa-plus-square fa-fw mr-1"></i> Adicionar</a>
        @endslot

        @slot('breadcrumbs')
            @include('gabinete::layouts.breadcrumbs', ['b' => Breadcrumbs::render('g-prefeitura')])
        @endslot
    @endcomponent

    <div class="container-fluid">

        <a href="#" data-toggle="modal" data-target="#m-search" class="btn btn-primary mr-2"><i class="fas fa-search fa-fw mr-2"></i> Buscar</a>
        {!! request()->query() ? '<a href="' . url(request()->url()) . '" class="btn btn-outline-danger"><i class="far fa-times-circle mr-2"></i>Cancelar filtro</a>' : null !!}

        @component('ui::card')
            @if($prefeituras->count())
                <div class="table-responsive">
                    <table class="table table-nowrap">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Prefeitura</th>
                                <th>Status</th>
                                <th>Adicionado em</th>
                                <th class="table-actions">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($prefeituras as $prefeitura)
                                <tr>
                                    <td>{{ $prefeitura->codigo }}</td>
                                    <td><a href="{{ url($prefeitura->path()) }}"><strong>{{ $prefeitura->titulo }}</strong></a></td>
                                    <td>Ativa</td>
                                    <td>{{ $prefeitura->created_at->format('d/m/Y') }}</td>
                                    <td class="table-actions">
                                        {!! Form::open(['url' => route('prefeitura.destroy', ['prefeitura' => $prefeitura]), 'method' => 'delete']) !!}
                                            <a data-toggle="tooltip" title="Editar" href="{{ route('prefeitura.edit', ['prefeitura' => $prefeitura]) }}" class="btn btn-table-actions btn-link"><i class="far fa-edit fa-fw"></i></a>
                                            <button data-toggle="tooltip" title="Remover" type="sumbit" class="btn btn-table-actions text-danger btn-link confirm-delete"><i class="far fa-trash-alt fa-fw"></i></button>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {!! $prefeituras->links() !!}

            @else
                @include('ui::no-results')
            @endif
        @endcomponent
    </div>

    @include('gabinete::prefeitura.partials.search')
@endsection