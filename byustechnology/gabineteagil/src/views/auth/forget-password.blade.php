@extends('gabinete::auth.app')
@section('title', 'Esqueci minha senha')
@section('content')

    <div class="d-flex vh-100 align-items-center justify-content-center">
        {!! Form::open(['url' => route('password.email'), 'method' => 'post', 'class' => 'w-100']) !!}
            <div class="container">
                <div class="row">
                    <div class="offset-lg-4 col-lg-4">
                        <div class="animate__animated animate__fadeIn bg-white p-4 rounded shadow">
                        <img class="d-block mb-4 mx-auto" src="{{ asset('assets/images/logotipo.png') }}" alt="Logotipo {{ config('app.name') }}" width="200">
                            
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="list-unstyled mb-0">
                                        @foreach($errors->all() as $error)
                                            <li><small><i class="fas fa-times mr-1 fa-fw"></i> {{ $error }}</small></li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            @if (session('status'))
                                <div class="alert alert-success animate__animated animate__bounce">
                                    <i class="fas fa-info-circle fa-fw mr-1"></i><strong>{{ session('status') }}. Verifique a sua caixa de entrada e a sua caixa de spam.</strong>
                                </div>
                                <hr>
                            @endif

                            <h1 class="h3">Esqueceu sua senha?</h1>
                            <p>Para recuperar a sua senha, por favor, informe o seu e-mail de cadastro abaixo. Iremos encaminhar um link com a sua nova senha.</p>
                            
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-envelope fa-fw"></i></span>
                                    </div>
                                    {!! Form::email('email', null, ['placeholder' => 'Digite o seu e-mail...', 'class' => 'form-control', 'autocomplete' => 'off']) !!}
                                </div>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-lg btn-success btn-block mt-2 mb-3">Solicitar reset</button>
                                <a href="{{ route('login') }}">Voltar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
@endsection