@extends('gabinete::pessoa.partials.layout')
@section('title', $pessoa->titulo . ' - Contatos')
@section('s-header')

    @component('gabinete::layouts.title')

        <h1 class="d-block mb-3 mt-4 h3">{{ $pessoa->titulo }} - Contatos</h1>

        @slot('actions')
            <a href="{{ route('pessoa.create') }}" class="btn btn-success"><i class="far fa-plus-square fa-fw mr-1"></i> Adicionar</a>
        @endslot

        @slot('actions')
            <a href="{{ route('pessoa.contato.create', ['pessoa' => $pessoa]) }}" class="btn btn-success"><i class="far fa-plus-square fa-fw mr-1"></i> Adicionar</a>
        @endslot

        @slot('breadcrumbs')
            @include('gabinete::layouts.breadcrumbs', ['b' => Breadcrumbs::render('g-pessoa-contato', $pessoa)])
        @endslot
    @endcomponent
@endsection

@section('s-content')

    @component('ui::card')
        <a href="#" data-toggle="modal" data-target="#m-search" class="btn btn-primary mr-2"><i class="fas fa-search fa-fw mr-2"></i> Buscar</a>
        {!! request()->query() ? '<a href="' . url(request()->url()) . '" class="btn btn-outline-danger"><i class="far fa-times-circle mr-2"></i>Cancelar filtro</a>' : null !!}

        @if ( ! $contatos->isEmpty())
        <div class="table-responsive mt-3">
            <table class="table table-nowrap">
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Tipo</th>
                        <th>Valor</th>
                        <th class="table-actions">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contatos as $contato)
                    <tr>
                        <td>
                            <a href="{{ url($contato->path()) }}"><strong>{{ $contato->titulo }}</strong></a>
                        </td>
                        <td>{{ \ByusTechnology\Gabinete\Models\PessoaContato::TIPOS[$contato->tipo] }}</td>
                        <td>{{ $contato->valor }}</td>
                        <td class="table-actions">
                            {!! Form::open(['url' => route('pessoa.contato.destroy', ['pessoa' => $pessoa, 'contato' => $contato]), 'method' => 'delete']) !!}
                            <a data-toggle="tooltip" title="Editar" href="{{ route('pessoa.contato.edit', ['pessoa' => $pessoa, 'contato' => $contato]) }}" class="btn btn-table-actions btn-link"><i class="far fa-edit fa-fw"></i></a>
                            <button data-toggle="tooltip" title="Remover" type="sumbit" class="btn btn-table-actions text-danger btn-link"><i class="far fa-trash-alt fa-fw"></i></button>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else

        @include('ui::no-results')

        @endif
    @endcomponent
@endsection