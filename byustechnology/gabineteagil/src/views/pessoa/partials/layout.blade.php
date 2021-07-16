@extends('gabinete::layouts.main')

@section('content')

    <!-- Headers -->
    @yield('s-header')

    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-4">
                <!-- Toolbar -->
                @include('gabinete::pessoa.partials.navbar')
            </div>
            <div class="col-lg">
                <!-- Conteúdo -->
                @yield('s-content')
            </div>
        </div>
    </div>

    <!-- Logout form -->
    {!! Form::open(['url' => route('logout'), 'method' => 'post', 'style' => 'display: none', 'id' => 'logout-form']) !!}
    {!! Form::close() !!}

@endsection