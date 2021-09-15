@extends('gabinete::layouts.main')
@section('title', 'Relatório de ocorrências por assunto')
@section('content')

@component('gabinete::layouts.title')

    <h1 class="d-block mb-3 mt-4 h3">Ocorrências</h1>

    @slot('breadcrumbs')
        @include('gabinete::layouts.breadcrumbs', ['b' => Breadcrumbs::render('g-ocorrencia-relatorio-por-assunto')])
    @endslot
@endcomponent

{!! Form::open(['url' => route('ocorrencia.relatorio.por-assunto'), 'method' => 'get']) !!}
    @include('gabinete::ocorrencia.relatorio.por-assunto.partials.form')
{!! Form::close() !!}

@endsection