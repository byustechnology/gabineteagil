<?php

// Dashboard
Breadcrumbs::for('g-dashboard', function ($trail) {
    $trail->push('Dashboard', route('gabinete.dashboard'));
});

// Conta
Breadcrumbs::for('g-conta', function ($trail) {
    $trail->parent('g-dashboard');
    $trail->push('Minha conta', route('conta.index'));
});

// Etapas
Breadcrumbs::for('g-etapa', function ($trail) {
    $trail->parent('g-dashboard');
    $trail->push('Etapas', route('etapa.index'));
});
Breadcrumbs::for('g-etapa-create', function ($trail) {
    $trail->parent('g-etapa');
    $trail->push('Adicionar', route('etapa.create'));
});
Breadcrumbs::for('g-etapa-show', function ($trail, $etapa) {
    $trail->parent('g-etapa');
    $trail->push($etapa->titulo, route('etapa.show', ['etapa' => $etapa]));
});
Breadcrumbs::for('g-etapa-edit', function ($trail, $etapa) {
    $trail->parent('g-etapa-show', $etapa);
    $trail->push('Editar', route('etapa.edit', ['etapa' => $etapa]));
});

// Usuários
Breadcrumbs::for('g-usuario', function ($trail) {
    $trail->parent('g-dashboard');
    $trail->push('Usuários', route('usuario.index'));
});
Breadcrumbs::for('g-usuario-create', function ($trail) {
    $trail->parent('g-usuario');
    $trail->push('Adicionar', route('usuario.create'));
});
Breadcrumbs::for('g-usuario-show', function ($trail, $usuario) {
    $trail->parent('g-usuario');
    $trail->push($usuario->name, route('usuario.show', ['usuario' => $usuario]));
});
Breadcrumbs::for('g-usuario-edit', function ($trail, $usuario) {
    $trail->parent('g-usuario-show', $usuario);
    $trail->push('Editar', route('usuario.edit', ['usuario' => $usuario]));
});

// Tipos de ocorrências
Breadcrumbs::for('g-ocorrencia-tipo', function ($trail) {
    $trail->parent('g-dashboard');
    $trail->push('Tipos de ocorrência', route('ocorrencia.tipo.index'));
});
Breadcrumbs::for('g-ocorrencia-tipo-create', function ($trail) {
    $trail->parent('g-ocorrencia-tipo');
    $trail->push('Adicionar', route('ocorrencia.tipo.create'));
});
Breadcrumbs::for('g-ocorrencia-tipo-show', function ($trail, $tipo) {
    $trail->parent('g-ocorrencia-tipo');
    $trail->push($tipo->titulo, route('ocorrencia.tipo.show', ['tipo' => $tipo]));
});
Breadcrumbs::for('g-ocorrencia-tipo-edit', function ($trail, $tipo) {
    $trail->parent('g-ocorrencia-tipo-show', $tipo);
    $trail->push('Editar', route('ocorrencia.tipo.edit', ['tipo' => $tipo]));
});

// Orgãos responsáveis
Breadcrumbs::for('g-orgao', function ($trail) {
    $trail->parent('g-dashboard');
    $trail->push('Orgãos responsáveis', route('orgao.index'));
});
Breadcrumbs::for('g-orgao-create', function ($trail) {
    $trail->parent('g-orgao');
    $trail->push('Adicionar', route('orgao.create'));
});
Breadcrumbs::for('g-orgao-show', function ($trail, $orgao) {
    $trail->parent('g-orgao');
    $trail->push($orgao->titulo, route('orgao.show', ['orgao' => $orgao]));
});
Breadcrumbs::for('g-orgao-edit', function ($trail, $orgao) {
    $trail->parent('g-orgao-show', $orgao);
    $trail->push('Editar', route('orgao.edit', ['orgao' => $orgao]));
});

// Assuntos
Breadcrumbs::for('g-assunto', function ($trail) {
    $trail->parent('g-dashboard');
    $trail->push('Assuntos', route('assunto.index'));
});
Breadcrumbs::for('g-assunto-create', function ($trail) {
    $trail->parent('g-assunto');
    $trail->push('Adicionar', route('assunto.create'));
});
Breadcrumbs::for('g-assunto-show', function ($trail, $assunto) {
    $trail->parent('g-assunto');
    $trail->push($assunto->titulo, route('assunto.show', ['assunto' => $assunto]));
});
Breadcrumbs::for('g-assunto-edit', function ($trail, $assunto) {
    $trail->parent('g-assunto-show', $assunto);
    $trail->push('Editar', route('assunto.edit', ['assunto' => $assunto]));
});

// Agendas
Breadcrumbs::for('g-agenda', function ($trail) {
    $trail->parent('g-dashboard');
    $trail->push('Agendas', route('agenda.index'));
});
Breadcrumbs::for('g-agenda-create', function ($trail) {
    $trail->parent('g-agenda');
    $trail->push('Adicionar', route('agenda.create'));
});
Breadcrumbs::for('g-agenda-show', function ($trail, $agenda) {
    $trail->parent('g-agenda');
    $trail->push($agenda->titulo, route('agenda.show', ['agenda' => $agenda]));
});
Breadcrumbs::for('g-agenda-edit', function ($trail, $agenda) {
    $trail->parent('g-agenda-show', $agenda);
    $trail->push('Editar', route('agenda.edit', ['agenda' => $agenda]));
});

// Pessoas
Breadcrumbs::for('g-pessoa', function ($trail) {
    $trail->parent('g-dashboard');
    $trail->push('Pessoas', route('pessoa.index'));
});
Breadcrumbs::for('g-pessoa-create', function ($trail) {
    $trail->parent('g-pessoa');
    $trail->push('Adicionar', route('pessoa.create'));
});
Breadcrumbs::for('g-pessoa-show', function ($trail, $pessoa) {
    $trail->parent('g-pessoa');
    $trail->push($pessoa->titulo, route('pessoa.show', ['pessoa' => $pessoa]));
});
Breadcrumbs::for('g-pessoa-edit', function ($trail, $pessoa) {
    $trail->parent('g-pessoa-show', $pessoa);
    $trail->push('Editar', route('pessoa.edit', ['pessoa' => $pessoa]));
});

// Pessoas, contato
Breadcrumbs::for('g-pessoa-contato', function ($trail, $pessoa) {
    $trail->parent('g-pessoa-show', $pessoa);
    $trail->push('Contatos', route('pessoa.contato.index', ['pessoa' => $pessoa]));
});
Breadcrumbs::for('g-pessoa-contato-create', function ($trail, $pessoa) {
    $trail->parent('g-pessoa-contato', $pessoa);
    $trail->push('Adicionar', route('pessoa.contato.create', ['pessoa' => $pessoa]));
});
Breadcrumbs::for('g-pessoa-contato-show', function ($trail, $pessoa, $contato) {
    $trail->parent('g-pessoa-contato', $pessoa);
    $trail->push($contato->titulo, route('pessoa.show', ['pessoa' => $pessoa, 'contato' => $contato]));
});
Breadcrumbs::for('g-pessoa-contato-edit', function ($trail, $pessoa, $contato) {
    $trail->parent('g-pessoa-contato-show', $pessoa, $contato);
    $trail->push('Editar', route('pessoa.edit', ['pessoa' => $pessoa, 'contato' => $contato]));
});

// Ocorrências
Breadcrumbs::for('g-ocorrencia', function ($trail) {
    $trail->parent('g-dashboard');
    $trail->push('Ocorrências', route('ocorrencia.index', ['abertas' => 1]));
});
Breadcrumbs::for('g-ocorrencia-create', function ($trail) {
    $trail->parent('g-ocorrencia');
    $trail->push('Adicionar', route('ocorrencia.create'));
});
Breadcrumbs::for('g-ocorrencia-show', function ($trail, $ocorrencia) {
    $trail->parent('g-ocorrencia');
    $trail->push($ocorrencia->titulo, route('ocorrencia.show', ['ocorrencia' => $ocorrencia]));
});
Breadcrumbs::for('g-ocorrencia-edit', function ($trail, $ocorrencia) {
    $trail->parent('g-ocorrencia-show', $ocorrencia);
    $trail->push('Editar', route('ocorrencia.edit', ['ocorrencia' => $ocorrencia]));
});

// Ocorrências, mensagem
Breadcrumbs::for('g-ocorrencia-mensagem', function ($trail, $ocorrencia) {
    $trail->parent('g-ocorrencia-show', $ocorrencia);
    $trail->push('Mensagens', route('ocorrencia.mensagem.index', ['ocorrencia' => $ocorrencia]));
});
Breadcrumbs::for('g-ocorrencia-mensagem-create', function ($trail, $ocorrencia) {
    $trail->parent('g-ocorrencia-show', $ocorrencia);
    $trail->push('Adicionar', route('ocorrencia.mensagem.create', ['ocorrencia' => $ocorrencia]));
});
Breadcrumbs::for('g-ocorrencia-mensagem-show', function ($trail, $ocorrencia, $mensagem) {
    $trail->parent('g-ocorrencia-show', $ocorrencia);
    $trail->push($mensagem->id, route('ocorrencia.mensagem.show', ['ocorrencia' => $ocorrencia, 'mensagem' => $mensagem]));
});
Breadcrumbs::for('g-ocorrencia-mensagem-edit', function ($trail, $ocorrencia, $mensagem) {
    $trail->parent('g-ocorrencia-mensagem-show', $ocorrencia, $mensagem);
    $trail->push('Editar', route('ocorrencia.edit', ['ocorrencia' => $ocorrencia, 'mensagem' => $mensagem]));
});

// Ocorrências, arquivo
Breadcrumbs::for('g-ocorrencia-arquivo', function ($trail, $ocorrencia) {
    $trail->parent('g-ocorrencia-show', $ocorrencia);
    $trail->push('Arquivos', route('ocorrencia.arquivo.index', ['ocorrencia' => $ocorrencia]));
});
Breadcrumbs::for('g-ocorrencia-arquivo-create', function ($trail, $ocorrencia) {
    $trail->parent('g-ocorrencia-show', $ocorrencia);
    $trail->push('Adicionar', route('ocorrencia.arquivo.create', ['ocorrencia' => $ocorrencia]));
});
Breadcrumbs::for('g-ocorrencia-arquivo-show', function ($trail, $ocorrencia, $arquivo) {
    $trail->parent('g-ocorrencia-show', $ocorrencia);
    $trail->push($arquivo->id, route('ocorrencia.arquivo.show', ['ocorrencia' => $ocorrencia, 'arquivo' => $arquivo]));
});
Breadcrumbs::for('g-ocorrencia-arquivo-edit', function ($trail, $ocorrencia, $arquivo) {
    $trail->parent('g-ocorrencia-arquivo-show', $ocorrencia, $arquivo);
    $trail->push('Editar', route('ocorrencia.edit', ['ocorrencia' => $ocorrencia, 'arquivo' => $arquivo]));
});

// Ocorrência, relatório
Breadcrumbs::for('g-ocorrencia-relatorio', function ($trail) {
    $trail->parent('g-ocorrencia');
    $trail->push('Relatórios');
});
Breadcrumbs::for('g-ocorrencia-relatorio-por-assunto', function ($trail) {
    $trail->parent('g-ocorrencia-relatorio');
    $trail->push('Por assunto', route('ocorrencia.relatorio.por-assunto'));
});
Breadcrumbs::for('g-ocorrencia-relatorio-por-assunto-show', function ($trail) {
    $trail->parent('g-ocorrencia-relatorio-por-assunto');
    $trail->push('Visualizar');
});

// Mapa
Breadcrumbs::for('g-mapa', function ($trail) {
    $trail->parent('g-dashboard');
    $trail->push('Mapa', route('mapa.index'));
});