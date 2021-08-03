@extends('gabinete::layouts.main')
@section('title', 'Relatório de ocorrências por assunto')
@section('content')

@component('gabinete::layouts.title')

    <h1 class="d-block mb-3 mt-4 h3">Ocorrências</h1>

    @slot('breadcrumbs')
        @include('gabinete::layouts.breadcrumbs', ['b' => Breadcrumbs::render('g-ocorrencia')])
    @endslot
@endcomponent

<div class="container-fluid">

</div>

@endsection