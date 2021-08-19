@extends('gabinete::layouts.main')
@section('title', 'Adicionar tipo de ocorrência')
@section('content')

    @component('gabinete::layouts.title')
        
        <h1 class="d-block my-3 mt-4 h3">Adicionar tipo de ocorrência</h1>

        @slot('breadcrumbs')
            @include('gabinete::layouts.breadcrumbs', ['b' => Breadcrumbs::render('g-ocorrencia-tipo-create')])
        @endslot
    @endcomponent

    {!! Form::open(['url' => route('ocorrencia.tipo.store'), 'method' => 'post']) !!}
        @include('gabinete::ocorrencia.tipo.partials.form')
    {!! Form::close() !!}
@endsection