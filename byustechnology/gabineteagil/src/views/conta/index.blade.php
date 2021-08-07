@extends('gabinete::layouts.main')
@section('title', 'Minha conta')
@section('content')

@component('gabinete::layouts.title')

    <h1 class="d-block mb-3 mt-4 h3">Minha conta</h1>

    @slot('breadcrumbs')
        @include('gabinete::layouts.breadcrumbs', ['b' => Breadcrumbs::render('g-conta')])
    @endslot
@endcomponent

<div class="container-fluid">

    <div class="row">

        <div class="col-lg-4">
            @component('ui::card')
                @slot('title')
                    Ações da conta
                @endslot

                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link bg-light mb-2 rounded active" href="{{ route('conta.index') }}">Geral</a>
                        <a class="nav-link bg-light mb-2 rounded" href="#" data-toggle="modal" data-target="#m-dados">Alterar meus dados</a>
                        <a class="nav-link bg-light mb-2 rounded" href="#" data-toggle="modal" data-target="#m-senha">Alterar minha senha</a>
                    </li>
                </ul>
            @endcomponent
        </div>
        <div class="col-lg-8">
            @component('ui::card')
                @slot('title')
                    Dados da minha conta
                @endslot

                @component('ui::attribute', ['title' => 'Nome completo'])
                    {{ $usuario->name }}
                @endcomponent

                @component('ui::attribute', ['title' => 'E-mail'])
                    <a href="mailto:{{ $usuario->email }}">{{ $usuario->email }}</a>
                @endcomponent

                <div class="row">
                    <div class="col-lg">
                        @component('ui::attribute', ['title' => 'Adicionado em'])
                            {{ $usuario->created_at->format('d/m/Y') }}, {{ $usuario->created_at->diffForHumans() }}
                        @endcomponent
                    </div>
                    <div class="col-lg">
                        @component('ui::attribute', ['title' => 'Alterado em'])
                            {{ $usuario->updated_at->format('d/m/Y') }}, {{ $usuario->updated_at->diffForHumans() }}
                        @endcomponent
                    </div>
                </div>

            @endcomponent
        </div>

    </div>
</div>

<script>
    $(function() {
        
        @if (request()->has('senha'))
            $('#m-senha').modal('show')
        @endif

        @if (request()->has('dados'))
            $('#m-dados').modal('show')
        @endif

    }, (jQuery))
</script>

@include('gabinete::conta.partials.dados')
@include('gabinete::conta.partials.senha')

@endsection