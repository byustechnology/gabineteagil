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
        @if( ! $mensagens->isEmpty())
            @component('gabinete::components.card')
                <div style="background: #ddd;" class="p-4 rounded">
                    @foreach($mensagens as $mensagem)
                        <div class="w-50 {{ $mensagem->foiEnviadaPorMim() ? 'ml-auto' : '' }}">
                            @include('gabinete::components.message-ballon', ['mensagem' => $mensagem])
                        </div>                    
                    @endforeach
                </div>
            @endcomponent
        @else
            @include('gabinete::components.no-results')
        @endif
    </div>
@endsection