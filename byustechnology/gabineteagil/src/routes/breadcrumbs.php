<?php

// Dashboard
Breadcrumbs::for('g-dashboard', function ($trail) {
    $trail->push('Dashboard', route('gabinete.dashboard'));
});

// Etapas
Breadcrumbs::for('g-etapa', function ($trail) {
    $trail->parent('g-dashboard');
    $trail->push('Etapas', route('etapa.index'));
});
Breadcrumbs::for('g-etapa-create', function ($trail) {
    $trail->parent('g-etapa');
    $trail->push('Adicionar', route('etapa.crete'));
});
Breadcrumbs::for('g-etapa-show', function ($trail, $etapa) {
    $trail->parent('g-etapa');
    $trail->push($etapa->titulo, route('etapa.show', ['etapa' => $etapa]));
});
Breadcrumbs::for('g-etapa-edit', function ($trail, $etapa) {
    $trail->parent('g-etapa-show', $etapa);
    $trail->push('Editar', route('etapa.edit', ['etapa' => $etapa]));
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

// Pessoas
Breadcrumbs::for('g-ocorrencia', function ($trail) {
    $trail->parent('g-dashboard');
    $trail->push('Ocorrências', route('ocorrencia.index'));
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
