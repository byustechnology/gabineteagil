@extends('gabinete::ocorrencia.partials.layout')
@section('title', 'Arquivos - ' . $ocorrencia->titulo . ' - Ocorrências')
@section('s-header')

    @component('gabinete::layouts.title')
        <h1 class="d-block my-3 mt-4 h3">Arquivos de {{ $ocorrencia->titulo }} - Ocorrências</h1>

        @slot('breadcrumbs')
            @include('gabinete::layouts.breadcrumbs', ['b' => Breadcrumbs::render('g-ocorrencia-arquivo', $ocorrencia)])
        @endslot
    @endcomponent
@endsection
@section('s-content')

    <div class="container-fluid">
        @component('ui::card')
            @if( ! $arquivos->isEmpty())
                <div class="table-responsive mt-3">
                    <table class="table table-hover table-striped table-nowrap">
                        <thead>
                            <tr>
                                <th>Ocorrência</th>
                                <th>Pessoa</th>
                                <th class="text-center">Status</th>
                                <th>Adicionado em</th>
                                <th class="table-actions">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($arquivos as $arquivo)
                                <tr>
                                    <td><a href="{{ $arquivo->url }}">{{ $arquivo->arquivo }}</a></td>
                                    <td>{{ $arquivo->user->name }}</td>
                                    <td class="text-center"><i data-toggle="tooltip" title="{{ $arquivo->mime }}" class="{{ $arquivo->icone_mime }} fa-fw"></i></td>
                                    <td>{{ $arquivo->created_at->format('d/m/Y') }}</td>
                                    <td class="table-actions">
                                        {!! Form::open(['url' => route('ocorrencia.arquivo.destroy', ['ocorrencia' => $ocorrencia, 'arquivo' => $arquivo]), 'method' => 'delete']) !!}
                                        <button data-toggle="tooltip" title="Remover" type="sumbit" class="btn btn-table-actions text-danger btn-link confirm-delete"><i class="far fa-trash-alt fa-fw"></i></button>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {!! $arquivos->links() !!}
            @else
                @include('ui::no-results')
            @endif
        @endcomponent
    </div>
@endsection