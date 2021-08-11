@extends('gabinete::layouts.main')
@section('title', 'Adicionar usuário')
@section('content')

    @component('gabinete::layouts.title')
        
        <h1 class="d-block my-3 mt-4 h3">Adicionar usuário</h1>

        @slot('breadcrumbs')
            @include('gabinete::layouts.breadcrumbs', ['b' => Breadcrumbs::render('g-usuario-create')])
        @endslot
    @endcomponent

    {!! Form::open(['url' => route('usuario.store'), 'method' => 'post']) !!}
        @include('gabinete::usuario.partials.form')
    {!! Form::close() !!}
@endsection