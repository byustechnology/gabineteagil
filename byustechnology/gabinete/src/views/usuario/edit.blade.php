@extends('gabinete::layouts.main')
@section('title', 'Editar ' . $usuario->name . ' - Usuário')
@section('content')

    @component('gabinete::layouts.title')
        
        <h1 class="d-block my-3 mt-4 h3">Editar {{ $usuario->name }} - Usuário</h1>

        @slot('breadcrumbs')
            @include('gabinete::layouts.breadcrumbs', ['b' => Breadcrumbs::render('g-usuario-edit', $usuario)])
        @endslot
    @endcomponent

    {!! Form::model($usuario, ['url' => route('usuario.update', ['usuario' => $usuario]), 'method' => 'put']) !!}
        @include('gabinete::usuario.partials.form')
    {!! Form::close() !!}
@endsection