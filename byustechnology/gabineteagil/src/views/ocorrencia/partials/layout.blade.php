@extends('gabinete::layouts.main')

@section('content')

    <!-- Headers -->
    @yield('s-header')

    <div class="container-fluid">
        <!-- Toolbar -->
        @include('gabinete::ocorrencia.partials.navbar')
    </div>

    <!-- Conteúdo -->
    @yield('s-content')

    <!-- Modals -->
    @include('gabinete::ocorrencia.partials.mensagem')
    @include('gabinete::ocorrencia.partials.etapa')
    @include('gabinete::ocorrencia.partials.avancar')
    @include('gabinete::ocorrencia.partials.arquivo')
    @include('gabinete::ocorrencia.partials.concluir')
    @include('gabinete::ocorrencia.partials.cancelar')

@endsection