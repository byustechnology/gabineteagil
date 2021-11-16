@extends('gabinete::layouts.main')
@section('title', 'Editar ' . $prefeitura->titulo . ' - Prefeitura')
@section('content')

    @component('gabinete::layouts.title')

        <h1 class="d-block my-3 mt-4 h3">Editar {{ $prefeitura->titulo }} - Prefeitura</h1>

        @slot('breadcrumbs')
            @include('gabinete::layouts.breadcrumbs', ['b' => Breadcrumbs::render('g-prefeitura-edit', $prefeitura)])
        @endslot
    @endcomponent

    {!! Form::model($prefeitura, ['url' => route('prefeitura.update', ['prefeitura' => $prefeitura]), 'method' => 'post']) !!}
        @include('gabinete::prefeitura.partials.form')
    {!! Form::close() !!}
@endsection