@extends('gabinete::layouts.main')
@section('title', 'Adicionar assunto')
@section('content')

    @component('gabinete::layouts.title')
        
        <h1 class="d-block my-3 mt-4 h3">Adicionar assunto</h1>

        @slot('breadcrumbs')
            @include('gabinete::layouts.breadcrumbs', ['b' => Breadcrumbs::render('g-assunto-create')])
        @endslot
    @endcomponent

    {!! Form::open(['url' => route('assunto.store'), 'method' => 'post']) !!}
        @include('gabinete::assunto.partials.form')
    {!! Form::close() !!}
@endsection