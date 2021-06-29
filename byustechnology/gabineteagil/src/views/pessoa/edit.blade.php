@extends('gabinete::layouts.main')
@section('title', 'Editar ' . $pessoa->titulo . ' - Pessoas')
@section('content')

@component('gabinete::layouts.title')

<h1 class="d-block my-3 mt-4 h3">Editar {{ $pessoa->titulo }} - Pessoas</h1>

@slot('breadcrumbs')
@include('gabinete::layouts.breadcrumbs', ['b' => Breadcrumbs::render('g-pessoa-edit', $pessoa)])
@endslot
@endcomponent

{!! Form::model($pessoa, ['url' => route('pessoa.update', ['pessoa' => $pessoa]), 'method' => 'put']) !!}
@include('gabinete::pessoa.partials.form')
{!! Form::close() !!}
@endsection