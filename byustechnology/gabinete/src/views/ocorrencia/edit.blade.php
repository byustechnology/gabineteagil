@extends('gabinete::layouts.main')
@section('title', 'Editar ' . $ocorrencia->titulo . ' - OcorrĂȘncias')
@section('content')

@component('gabinete::layouts.title')

    <h1 class="d-block my-3 mt-4 h3">Editar {{ $ocorrencia->titulo }} - OcorrĂȘncias</h1>

    @slot('breadcrumbs')
        @include('gabinete::layouts.breadcrumbs', ['b' => Breadcrumbs::render('g-ocorrencia-edit', $ocorrencia)])
    @endslot
@endcomponent

{!! Form::model($ocorrencia, ['url' => route('ocorrencia.update', ['ocorrencia' => $ocorrencia]), 'method' => 'put', 'id' => 'form']) !!}
    @include('gabinete::ocorrencia.partials.form')
{!! Form::close() !!}
@endsection