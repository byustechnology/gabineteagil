@extends('gabinete::layouts.main')
@section('title', 'Adicionar ocorrência')
@section('content')

@component('gabinete::layouts.title')

    <h1 class="d-block my-3 mt-4 h3">Adicionar ocorrência</h1>

    @slot('breadcrumbs')
        @include('gabinete::layouts.breadcrumbs', ['b' => Breadcrumbs::render('g-ocorrencia-create')])
    @endslot
@endcomponent

{!! Form::open(['url' => route('ocorrencia.store'), 'method' => 'post', 'id' => 'form']) !!}
    @include('gabinete::ocorrencia.partials.form')
{!! Form::close() !!}
@endsection