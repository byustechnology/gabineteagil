@extends('gabinete::layouts.main')
@section('meta')
<script src="https://unpkg.com/chart.js@^2.9.3/dist/Chart.min.js"></script>
<script src="https://unpkg.com/@chartisan/chartjs@^2.1.0/dist/chartisan_chartjs.umd.js"></script>
@endsection
@section('content')
    <div class="container-fluid mt-4">
        <h2 class="h2 d-block">Dashboard - Administração</h2>
        <p>Você está acompanhando a <i>dashboard</i> para administração da aplicação {{ config('app.name') }}. Para realizar modificações, personifique um usuário através do menu de usuários ou prefeituras.</p>


        <div class="row">
            <div class="col-lg my-3">
                <div class="card card-body border-0 shadow-sm">
                    <div class="d-flex align-items-center">
                        <strong class="display-4 mr-4 ml-2">{{ \ByusTechnology\Gabinete\Models\Prefeitura::count() }}</strong>
                        <div>
                            <h5 class="m-0">Prefeituras/gabinetes cadastrados</h5>
                            <a href="{{ route('prefeitura.index') }}">Gerenciar prefeituras</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg my-3">
                <div class="card card-body border-0 shadow-sm">
                    <div class="d-flex align-items-center">
                        <strong class="display-4 mr-4 ml-2">{{ \ByusTechnology\Gabinete\Models\Usuario::count() }}</strong>
                        <div>
                            <h5 class="m-0">Usuários cadastrados</h5>
                            <a href="{{ route('usuario.index') }}">Visualizar usuários</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection