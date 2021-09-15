@extends('gabinete::layouts.main')
@section('title', 'Adicionar contato para ' . $pessoa->titulo)
@section('content')

@component('gabinete::layouts.title')

<h1 class="d-block my-3 mt-4 h3">Adicionar contato para {{ $pessoa->titulo }}</h1>

@slot('breadcrumbs')
@include('gabinete::layouts.breadcrumbs', ['b' => Breadcrumbs::render('g-pessoa-contato-create', $pessoa)])
@endslot
@endcomponent

{!! Form::open(['url' => route('pessoa.contato.store', ['pessoa' => $pessoa]), 'method' => 'post']) !!}
@include('gabinete::pessoa.contato.partials.form')
{!! Form::close() !!}
@endsection