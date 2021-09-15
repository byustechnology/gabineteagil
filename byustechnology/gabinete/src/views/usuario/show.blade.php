@extends('gabinete::layouts.main')
@section('title', $usuario->name . ' - Usuário')
@section('content')

    @component('gabinete::layouts.title')
        
        <h1 class="d-block my-3 mt-4 h3">{{ $usuario->name }} - Usuário</h1>

        @slot('actions')
            <a href="{{ route('usuario.edit', ['usuario' => $usuario]) }}" class="btn btn-success"><i class="far fa-edit fa-fw mr-1"></i> Editar</a>
        @endslot

        @slot('breadcrumbs')
            @include('gabinete::layouts.breadcrumbs', ['b' => Breadcrumbs::render('g-usuario-show', $usuario)])
        @endslot
    @endcomponent

    <div class="container-fluid">

        @component('ui::card')
            @slot('title')
                Informações do usuário
            @endslot
            
            <div class="row">
                <div class="col-lg-8">
                    @component('ui::attribute', ['title' => 'Título'])
                        {{ $usuario->name }}
                    @endcomponent
                </div>
                <div class="col-lg-4">
                    @component('ui::attribute', ['title' => 'E-mail'])
                        {{ $usuario->email }}
                    @endcomponent
                </div>
            </div>

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
    
@endsection