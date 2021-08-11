@extends('gabinete::layouts.main')
@section('title', 'Adicionar etapa')
@section('content')

    @component('gabinete::layouts.title')
        
        <h1 class="d-block my-3 mt-4 h3">Adicionar etapa</h1>

        @slot('breadcrumbs')
            @include('gabinete::layouts.breadcrumbs', ['b' => Breadcrumbs::render('g-etapa-create')])
        @endslot
    @endcomponent

    {!! Form::open(['url' => route('etapa.store'), 'method' => 'post']) !!}
        @include('gabinete::etapa.partials.form')
    {!! Form::close() !!}
@endsection