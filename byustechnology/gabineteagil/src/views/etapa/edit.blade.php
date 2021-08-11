@extends('gabinete::layouts.main')
@section('title', 'Editar ' . $etapa->titulo . ' - Etapa')
@section('content')

    @component('gabinete::layouts.title')
        
        <h1 class="d-block my-3 mt-4 h3">Editar {{ $etapa->titulo }} - Etapa</h1>

        @slot('breadcrumbs')
            @include('gabinete::layouts.breadcrumbs', ['b' => Breadcrumbs::render('g-etapa-edit', $etapa)])
        @endslot
    @endcomponent

    {!! Form::model($etapa, ['url' => route('etapa.update', ['etapa' => $etapa]), 'method' => 'put']) !!}
        @include('gabinete::etapa.partials.form')
    {!! Form::close() !!}
@endsection