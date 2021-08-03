@extends('gabinete::layouts.main')
@section('content')
    <div class="container-fluid mt-4">
        <h2 class="h2 d-block">Dashboard</h2>
        <p>Acompanhe as informações mais relevantes da aplicação no seu <i>dashboard</i></p>


        <div class="row">
            <div class="col-lg my-3">
                <div class="card card-body border-0 shadow-sm">
                    <div class="d-flex align-items-center">
                        <strong class="display-4 mr-4 ml-2">{{ \ByusTechnology\Gabinete\Models\Ocorrencia::abertas()->count() }}</strong>
                        <div>
                            <h5 class="m-0">Ocorrências em aberto</h5>
                            <a href="#">Visualizar ocorrências</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg my-3">
                <div class="card card-body border-0 shadow-sm">
                    <div class="d-flex align-items-center">
                        <strong class="display-4 mr-4 ml-2">{{ \ByusTechnology\Gabinete\Models\Ocorrencia::abertas()->whereDate('created_at', '<=', today())->count() }}</strong>
                        <div>
                            <h5 class="m-0">Abertas há 01 dia</h5>
                            <a href="#">Visualizar ocorrências</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg my-3">
                <div class="card card-body border-0 shadow-sm bg-danger text-white">
                    <div class="d-flex align-items-center">
                        <strong class="display-4 mr-4 ml-2">{{ \ByusTechnology\Gabinete\Models\Ocorrencia::atrasadas()->count() }}</strong>
                        <div>
                            <h5 class="m-0">Ocorrências em atraso</h5>
                            <a href="#" class="text-white">Visualizar ocorrências</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection