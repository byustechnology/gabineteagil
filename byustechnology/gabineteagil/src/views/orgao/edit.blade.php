@extends('gabinete::layouts.main')
@section('title', 'Editar ' . $orgao->titulo . ' - Orgão responsável')
@section('content')

    @component('gabinete::layouts.title')
        
        <h1 class="d-block my-3 mt-4 h3">Editar {{ $orgao->titulo }} - Orgão responsável</h1>

        @slot('breadcrumbs')
            @include('gabinete::layouts.breadcrumbs', ['b' => Breadcrumbs::render('g-orgao-edit', $orgao)])
        @endslot
    @endcomponent

    {!! Form::model($orgao, ['url' => route('orgao.update', ['orgao' => $orgao]), 'method' => 'put']) !!}
        @include('gabinete::orgao.partials.form')
    {!! Form::close() !!}
@endsection