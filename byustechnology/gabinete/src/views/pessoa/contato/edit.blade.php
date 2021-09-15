@extends('gabinete::layouts.main')
@section('title', 'Editar ' . $contato->titulo . ' - ' . $pessoa->titulo . '- Pessoas')
@section('content')

@component('gabinete::layouts.title')

<h1 class="d-block my-3 mt-4 h3">Editar {{ $contato->titulo }} - {{ $pessoa->titulo }} - Pessoas</h1>

@slot('breadcrumbs')
@include('gabinete::layouts.breadcrumbs', ['b' => Breadcrumbs::render('g-pessoa-contato-edit', $pessoa, $contato)])
@endslot
@endcomponent

{!! Form::model($contato, ['url' => route('pessoa.contato.update', ['pessoa' => $pessoa, 'contato' => $contato]), 'method' => 'put']) !!}
@include('gabinete::pessoa.contato.partials.form')
{!! Form::close() !!}
@endsection