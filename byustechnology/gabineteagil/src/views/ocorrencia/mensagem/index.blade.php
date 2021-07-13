@extends('gabinete::ocorrencia.partials.layout')
@section('title', 'Mensagens - ' . $ocorrencia->titulo . ' - Ocorrências')
@section('s-header')

    @component('gabinete::layouts.title')
        <h1 class="d-block my-3 mt-4 h3">Mensagens de {{ $ocorrencia->titulo }} - Ocorrências</h1>

        @slot('breadcrumbs')
            @include('gabinete::layouts.breadcrumbs', ['b' => Breadcrumbs::render('g-ocorrencia-mensagem', $ocorrencia)])
        @endslot
    @endcomponent
@endsection
@section('s-content')

    <div class="container-fluid">
        @if( ! $arquivos->isEmpty())
            @component('gabinete::components.card')
                <div class="table-responsive mt-3">
                    <table class="table table-hover table-striped">
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
                            @foreach($arquivos as $mensagem)
                                <tr>
                                    <td><a href="{{ $mensagem->url }}">{{ $mensagem->mensagem }}</a></td>
                                    <td>{{ $mensagem->user->name }}</td>
                                    <td class="text-center"><i data-toggle="tooltip" title="{{ $mensagem->mime }}" class="{{ $mensagem->icone_mime }} fa-fw"></i></td>
                                    <td>{{ $mensagem->created_at->format('d/m/Y') }}</td>
                                    <td class="table-actions">
                                        {!! Form::open(['url' => route('ocorrencia.mensagem.destroy', ['ocorrencia' => $ocorrencia, 'mensagem' => $mensagem]), 'method' => 'delete']) !!}
                                        <button data-toggle="tooltip" title="Remover" type="sumbit" class="btn btn-table-actions text-danger btn-link"><i class="far fa-trash-alt fa-fw"></i></button>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {!! $arquivos->links() !!}
            @endcomponent
        @else
            @include('gabinete::components.no-results')
        @endif
    </div>
@endsection