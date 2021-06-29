@extends('gabinete::layouts.main')
@section('title', 'Adicionar pessoa')
@section('content')

    @component('gabinete::layouts.title')
        
        <h1 class="d-block my-3 mt-4 h3">Adicionar pessoa</h1>

        @slot('breadcrumbs')
            @include('gabinete::layouts.breadcrumbs', ['b' => Breadcrumbs::render('g-pessoa-create')])
        @endslot
    @endcomponent

    {!! Form::open(['url' => route('pessoa.store'), 'method' => 'post']) !!}
        @include('gabinete::pessoa.partials.form')
    {!! Form::close() !!}
@endsection