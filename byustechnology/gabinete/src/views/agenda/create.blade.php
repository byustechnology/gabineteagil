@extends('gabinete::layouts.main')
@section('title', 'Adicionar agenda')
@section('content')

    @component('gabinete::layouts.title')
        
        <h1 class="d-block my-3 mt-4 h3">Adicionar agenda</h1>

        @slot('breadcrumbs')
            @include('gabinete::layouts.breadcrumbs', ['b' => Breadcrumbs::render('g-agenda-create')])
        @endslot
    @endcomponent

    {!! Form::open(['url' => route('agenda.store'), 'method' => 'post']) !!}
        @include('gabinete::agenda.partials.form')
    {!! Form::close() !!}
@endsection