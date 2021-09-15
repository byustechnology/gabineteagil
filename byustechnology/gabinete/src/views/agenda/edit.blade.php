@extends('gabinete::layouts.main')
@section('title', 'Editar ' . $agenda->titulo . ' - Agendas')
@section('content')

    @component('gabinete::layouts.title')
        
        <h1 class="d-block my-3 mt-4 h3">Editar {{ $agenda->titulo }} - Agendas</h1>

        @slot('breadcrumbs')
            @include('gabinete::layouts.breadcrumbs', ['b' => Breadcrumbs::render('g-agenda-edit', $agenda)])
        @endslot
    @endcomponent

    {!! Form::model($agenda, ['url' => route('agenda.update', ['agenda' => $agenda]), 'method' => 'put']) !!}
        @include('gabinete::agenda.partials.form')
    {!! Form::close() !!}
@endsection