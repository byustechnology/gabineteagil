@extends('gabinete::layouts.main')
@section('title', 'Adicionar orgão responsável')
@section('content')

    @component('gabinete::layouts.title')
        
        <h1 class="d-block my-3 mt-4 h3">Adicionar orgão responsável</h1>

        @slot('breadcrumbs')
            @include('gabinete::layouts.breadcrumbs', ['b' => Breadcrumbs::render('g-orgao-create')])
        @endslot
    @endcomponent

    {!! Form::open(['url' => route('orgao.store'), 'method' => 'post']) !!}
        @include('gabinete::orgao.partials.form')
    {!! Form::close() !!}
@endsection