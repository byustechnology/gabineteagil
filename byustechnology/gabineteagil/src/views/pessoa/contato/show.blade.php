@extends('gabinete::layouts.main')
@section('title', $contato->titulo . ' Contatos - ' . $pessoa->titulo . ' - Pessoas')
@section('content')

@component('gabinete::layouts.title')

<h1 class="d-block my-3 mt-4 h3">{{ $contato->titulo }} - {{ $pessoa->titulo }} - Pessoas</h1>

@slot('actions')
<a href="{{ route('pessoa.contato.edit', ['pessoa' => $pessoa, 'contato' => $contato]) }}" class="btn btn-success"><i class="far fa-edit fa-fw mr-1"></i> Editar</a>
@endslot

@slot('breadcrumbs')
@include('gabinete::layouts.breadcrumbs', ['b' => Breadcrumbs::render('g-pessoa-contato-show', $pessoa, $contato)])
@endslot
@endcomponent

<div class="container-fluid">

    <div class="row">
        <div class="col-lg-3">
            @component('gabinete::components.attribute', ['title' => 'Tipo do contato'])
            {{ \ByusTechnology\Gabinete\Models\PessoaContato::TIPOS[$contato->tipo] }}
            @endcomponent
        </div>
        <div class="col-lg">
            @component('gabinete::components.attribute', ['title' => 'Título do contato'])
            {{ $contato->titulo }}
            @endcomponent
        </div>
    </div>

    @component('gabinete::components.attribute', ['title' => 'Valor'])
    {{ $contato->valor }}
    @endcomponent

    @component('gabinete::components.attribute', ['title' => 'Observação'])
    {{ $contato->observacao ?? 'Nenhuma observação informada' }}
    @endcomponent

</div>

@endsection