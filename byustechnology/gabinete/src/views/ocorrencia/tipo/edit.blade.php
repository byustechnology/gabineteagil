@extends('gabinete::layouts.main')
@section('title', 'Editar ' . $tipo->titulo . ' - Tipos de ocorrência')
@section('content')

    @component('gabinete::layouts.title')
        
        <h1 class="d-block my-3 mt-4 h3">Editar {{ $tipo->titulo }} - Tipos de ocorrência</h1>

        @slot('breadcrumbs')
            @include('gabinete::layouts.breadcrumbs', ['b' => Breadcrumbs::render('g-ocorrencia-tipo-edit', $tipo)])
        @endslot
    @endcomponent

    {!! Form::model($tipo, ['url' => route('ocorrencia.tipo.update', ['tipo' => $tipo]), 'method' => 'put']) !!}
        @include('gabinete::ocorrencia.tipo.partials.form')
    {!! Form::close() !!}
@endsection