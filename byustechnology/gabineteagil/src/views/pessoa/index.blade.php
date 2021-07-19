@extends('gabinete::layouts.main')
@section('title', 'Pessoas')
@section('content')

@component('gabinete::layouts.title')

<h1 class="d-block mb-3 mt-4 h3">Pessoas</h1>

@slot('actions')
<a href="{{ route('pessoa.create') }}" class="btn btn-success"><i class="far fa-plus-square fa-fw mr-1"></i> Adicionar</a>
@endslot

@slot('breadcrumbs')
@include('gabinete::layouts.breadcrumbs', ['b' => Breadcrumbs::render('g-pessoa')])
@endslot
@endcomponent

<div class="container-fluid">

    <a href="#" data-toggle="modal" data-target="#m-search" class="btn btn-primary mr-2"><i class="fas fa-search fa-fw mr-2"></i> Buscar</a>
    {!! request()->query() ? '<a href="' . url(request()->url()) . '" class="btn btn-outline-danger"><i class="far fa-times-circle mr-2"></i>Cancelar filtro</a>' : null !!}

    @component('gabinete::components.card')
        @if( ! $pessoas->isEmpty())
            <div class="table-responsive mt-3">
                <table class="table table-nowrap">
                    <thead>
                        <tr>
                            <th>Título</th>
                            <th>Documento</th>
                            <th>Tipo</th>
                            <th class="table-actions">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pessoas as $pessoa)
                        <tr>
                            <td>
                                <a href="{{ url($pessoa->path()) }}"><strong>{{ $pessoa->titulo }}</strong></a><br>
                                <small class="text-muted">{{ $pessoa->endereco_completo }}</small>
                            </td>
                            <td>{{ $pessoa->codigo }}</td>
                            <td>{{ \ByusTechnology\Gabinete\Models\Pessoa::TIPO[$pessoa->tipo] }}</td>
                            <td class="table-actions">
                                {!! Form::open(['url' => route('pessoa.destroy', ['pessoa' => $pessoa->id]), 'method' => 'delete']) !!}
                                <a data-toggle="tooltip" title="Editar" href="{{ route('pessoa.edit', ['pessoa' => $pessoa]) }}" class="btn btn-table-actions btn-link"><i class="far fa-edit fa-fw"></i></a>
                                <button data-toggle="tooltip" title="Remover" type="sumbit" class="btn btn-table-actions text-danger btn-link"><i class="far fa-trash-alt fa-fw"></i></button>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {!! $pessoas->links() !!}
        @else
            @include('gabinete::components.no-results')
        @endif
    @endcomponent
</div>

@include('gabinete::pessoa.partials.search')
@endsection