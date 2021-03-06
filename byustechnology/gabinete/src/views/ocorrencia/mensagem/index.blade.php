@extends('gabinete::ocorrencia.partials.layout')
@section('title', 'Mensagens - ' . $ocorrencia->titulo . ' - OcorrĂȘncias')
@section('s-header')

    @component('gabinete::layouts.title')
        <h1 class="d-block my-3 mt-4 h3">Mensagens de {{ $ocorrencia->titulo }} - OcorrĂȘncias</h1>

        @slot('breadcrumbs')
            @include('gabinete::layouts.breadcrumbs', ['b' => Breadcrumbs::render('g-ocorrencia-mensagem', $ocorrencia)])
        @endslot
    @endcomponent
@endsection
@section('s-content')

    <div class="container-fluid">
        @component('ui::card')
            @if( ! $mensagens->isEmpty())
            
                <div class="message-container p-4 rounded">
                    @foreach($mensagens as $mensagem)

                        @if ($mensagem->tipo == 'user')
                            <div class="w-50 {{ $mensagem->foiEnviadaPorMim() ? 'ml-auto' : '' }}">
                                @include('ui::message-ballon', ['mensagem' => $mensagem])
                            </div>
                        @endif
                        @if ($mensagem->tipo == 'sys')
                            <div class="w-50 mx-auto my-4">
                                @include('ui::message-ballon', ['mensagem' => $mensagem])
                            </div>
                        @endif

                    @endforeach
                </div>
            @else
                @include('ui::no-results')
            @endif
        @endcomponent
    </div>
@endsection