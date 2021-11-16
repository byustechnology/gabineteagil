@extends('gabinete::layouts.main')
@section('title', 'Adicionar prefeitura')
@section('content')

    @component('gabinete::layouts.title')

        <h1 class="d-block my-3 mt-4 h3">Adicionar prefeitura</h1>

        @slot('breadcrumbs')
            @include('gabinete::layouts.breadcrumbs', ['b' => Breadcrumbs::render('g-prefeitura-create')])
        @endslot
    @endcomponent

    {!! Form::open(['url' => route('prefeitura.store'), 'method' => 'post']) !!}
        @include('gabinete::prefeitura.partials.form')
    {!! Form::close() !!}
@endsection