@extends('gabinete::ocorrencia.partials.layout')
@section('title', $ocorrencia->titulo . ' - Ocorrências')
@section('s-header')

    @component('gabinete::layouts.title')
        <h1 class="d-block my-3 mt-4 h3">{{ $ocorrencia->titulo }} - Ocorrências</h1>

        @slot('actions')
        <a href="{{ route('ocorrencia.edit', ['ocorrencia' => $ocorrencia]) }}" class="btn btn-success"><i class="far fa-edit fa-fw mr-1"></i> Editar</a>
        @endslot

        @slot('breadcrumbs')
            @include('gabinete::layouts.breadcrumbs', ['b' => Breadcrumbs::render('g-ocorrencia-show', $ocorrencia)])
        @endslot
    @endcomponent
@endsection
@section('s-content')
    <div class="container-fluid">
    
        <div class="row">
            <div class="col-lg-8">
                @component('ui::card')
                    @slot('title')
                        <h2 class="h6 d-block mb-0">Detalhes da ocorrência</h2>
                    @endslot

                    @component('ui::attribute', ['title' => 'Pessoa associada'])
                        <a href="{{ url($ocorrencia->pessoa->path()) }}">{{ $ocorrencia->pessoa->titulo }}</a>
                    @endcomponent
                    
                    @component('ui::attribute', ['title' => 'Assunto'])
                        {{ $ocorrencia->assunto->titulo }}
                    @endcomponent

                    @component('ui::attribute', ['title' => 'Orgão responsável'])
                        {{ $ocorrencia->orgaoResponsavel->titulo }}
                    @endcomponent

                    @component('ui::attribute', ['title' => 'Prevista para'])
                        {{ $ocorrencia->prevista_para->format('d/m/Y') }}, {{ $ocorrencia->prevista_para->diffForHumans() }}
                    @endcomponent

                    @component('ui::attribute', ['title' => 'Protocolo'])
                        {!! $ocorrencia->protocolo ?? '<span class="text-muted">Não informado</span>' !!}
                    @endcomponent

                    <div class="row">
                        <div class="col-lg-6">
                            @component('ui::attribute', ['title' => 'Adicionado em'])
                                {{ $ocorrencia->created_at->format('d/m/Y') }}, {{ $ocorrencia->created_at->diffForHumans() }}
                            @endcomponent
                        </div>
                        <div class="col-lg-6">
                            @component('ui::attribute', ['title' => 'Alterado em'])
                                {{ $ocorrencia->updated_at->format('d/m/Y') }}, {{ $ocorrencia->updated_at->diffForHumans() }}
                            @endcomponent
                        </div>
                    </div>
                @endcomponent

                @if ($ocorrencia->concluida())
                    @component('ui::card')
                        @slot('title')
                            Detalhes da conclusão
                        @endslot

                        @component('ui::attribute', ['title' => 'Data da conclusão'])
                            {{ $ocorrencia->concluida_em->format('d/m/Y') }} {{ $ocorrencia->concluida_em->diffForHumans() }}
                        @endcomponent

                        @component('ui::attribute', ['title' => 'Observação da conclusão'])
                            {!! $ocorrencia->concluida_observacao ?? '<span class="text-muted">Nenhum observação informada</span>' !!}
                        @endcomponent
                    @endcomponent
                @endif

                @component('ui::card')
                    @slot('title')
                        Descrição
                    @endslot

                    {!! $ocorrencia->descricao !!}
                @endcomponent

                @component('ui::card')
                    @slot('title')
                        <h2 class="h6 d-block mb-0">Arquivos associados</h2>
                    @endslot

                    <a href="#" data-toggle="modal" data-target="#m-ocorrencia-arquivo" class="btn btn-success btn-sm mb-2">Novo arquivo</a>

                    @if ($arquivos->count())
                        <div class="table-responsive mt-3">
                            <table class="table table-hover table-nowrap">
                                <thead>
                                    <tr>
                                        <th>Arquivo</th>
                                        <th>Usuário</th>
                                        <th class="text-center">Tipo</th>
                                        <th class="table-actions">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($arquivos as $arquivo)
                                    <tr>
                                        <td><a href="{{ $arquivo->url }}">{{ $arquivo->arquivo }}</a></td>
                                        <td>{{ $arquivo->user->name }}</td>
                                        <td class="text-center"><i data-toggle="tooltip" title="{{ $arquivo->mime }}" class="{{ $arquivo->icone_mime }} fa-fw"></i></td>
                                        <td class="table-actions">
                                            {!! Form::open(['url' => route('ocorrencia.arquivo.destroy', ['ocorrencia' => $ocorrencia, 'arquivo' => $arquivo]), 'method' => 'delete']) !!}
                                            <button data-toggle="tooltip" title="Remover" type="sumbit" class="btn btn-table-actions text-danger btn-link"><i class="far fa-trash-alt fa-fw"></i></button>
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        @include('ui::no-results')
                    @endif
                @endcomponent
            </div>
            <div class="col-lg">
                @component('ui::card')
                    @slot('title')
                        <h2 class="h6 d-block mb-0">Endereço</h2>
                    @endslot

                    @component('ui::attribute', ['title' => 'Logradouro'])
                        {{ $ocorrencia->logradouro }}
                    @endcomponent

                    @component('ui::attribute', ['title' => 'Número'])
                        {{ $ocorrencia->numero }}
                    @endcomponent

                    @component('ui::attribute', ['title' => 'Complemento'])
                        {!! $ocorrencia->complemento ?? '<span class="text-muted">Nenhum</span>' !!}
                    @endcomponent

                    @component('ui::attribute', ['title' => 'Cidade/Estado'])
                        {{ $ocorrencia->cidade }}/{{ $ocorrencia->estado}}
                    @endcomponent

                    @component('ui::attribute', ['title' => 'CEP'])
                        {{ $ocorrencia->cep }}
                    @endcomponent

                @endcomponent
                @component('ui::card')
                    @slot('title')
                        <h2 class="h6 d-block mb-0">Últimas mensagens</h2>
                    @endslot

                    <a href="#" data-toggle="modal" data-target="#m-ocorrencia-mensagem" class="btn btn-success btn-sm mb-2">Nova mensagem</a>
                    
                    @if ($ultimasMensagens->count())

                        @foreach($ultimasMensagens as $mensagem)
                            @include('ui::message-ballon', ['mensagem' => $mensagem])
                        @endforeach

                        <a href="{{ route('ocorrencia.mensagem.index', ['ocorrencia' => $ocorrencia]) }}" class="btn btn-secondary btn-block mt-3">Ver todas as mensagens</a>

                    @else
                        @include('ui::no-results')
                    @endif
                    
                @endcomponent
            </div>
        </div>
    </div>

@endsection