@extends('gabinete::layouts.main')
@section('title', 'Editar ' . $assunto->titulo . ' - Assuntos')
@section('content')

    @component('gabinete::layouts.title')
        
        <h1 class="d-block my-3 mt-4 h3">Editar {{ $assunto->titulo }} - Assuntos</h1>

        @slot('breadcrumbs')
            @include('gabinete::layouts.breadcrumbs', ['b' => Breadcrumbs::render('g-assunto-edit', $assunto)])
        @endslot
    @endcomponent

    {!! Form::model($assunto, ['url' => route('assunto.update', ['assunto' => $assunto]), 'method' => 'put']) !!}
        @include('gabinete::assunto.partials.form')
    {!! Form::close() !!}
@endsection