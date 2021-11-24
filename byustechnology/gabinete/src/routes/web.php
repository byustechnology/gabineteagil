<?php

Route::prefix(config('gabinete.path'))->middleware(['web', 'auth'])->group(function () {

    // Mapa das ocorrências
    Route::get('/mapa', \ByusTechnology\Gabinete\Http\Controllers\MapaController::class)->name('mapa.index');

    // Tipos de ocorrência
    Route::name('ocorrencia')->resource('/ocorrencia/tipo', \ByusTechnology\Gabinete\Http\Controllers\TipoOcorrenciaController::class);

    // Ocorrências
    Route::get('/ocorrencia/relatorio/por-assunto', [\ByusTechnology\Gabinete\Http\Controllers\OcorrenciaRelatorioController::class, 'porAssunto'])->name('ocorrencia.relatorio.por-assunto');
    Route::post('/ocorrencia/{ocorrencia}/notificar/whatsapp', [\ByusTechnology\Gabinete\Http\Controllers\OcorrenciaNotificacaoController::class, 'whatsApp'])->name('ocorrencia.notificar.whatsapp');
    Route::get('/ocorrencia/{ocorrencia}/pdf', [\ByusTechnology\Gabinete\Http\Controllers\OcorrenciaPdfController::class, 'pdf'])->name('ocorrencia.pdf.template');
    Route::post('/ocorrencia/{ocorrencia}/cancelar', [\ByusTechnology\Gabinete\Http\Controllers\OcorrenciaAcaoController::class, 'cancelar'])->name('ocorrencia.cancelar');
    Route::post('/ocorrencia/{ocorrencia}/concluir', [\ByusTechnology\Gabinete\Http\Controllers\OcorrenciaAcaoController::class, 'concluir'])->name('ocorrencia.concluir');
    Route::post('/ocorrencia/{ocorrencia}/etapa/escolher', [\ByusTechnology\Gabinete\Http\Controllers\OcorrenciaAcaoController::class, 'escolher'])->name('ocorrencia.etapa.escolher');
    Route::post('/ocorrencia/{ocorrencia}/etapa/avancar', [\ByusTechnology\Gabinete\Http\Controllers\OcorrenciaAcaoController::class, 'avancar'])->name('ocorrencia.etapa.avancar');
    Route::name('ocorrencia')->resource('/ocorrencia/{ocorrencia}/arquivo', \ByusTechnology\Gabinete\Http\Controllers\OcorrenciaArquivoController::class)->except(['edit', 'update']);
    Route::name('ocorrencia')->resource('/ocorrencia/{ocorrencia}/mensagem', \ByusTechnology\Gabinete\Http\Controllers\OcorrenciaMensagemController::class);
    Route::resource('/ocorrencia', \ByusTechnology\Gabinete\Http\Controllers\OcorrenciaController::class, ['parameters' => ['ocorrencia' => 'ocorrencia']]);

    // Pessoas
    Route::name('pessoa')->resource('/pessoa/{pessoa}/contato', \ByusTechnology\Gabinete\Http\Controllers\PessoaContatoController::class);
    Route::delete('/pessoa/{pessoa}/imagem', [\ByusTechnology\Gabinete\Http\Controllers\PessoaImagemController::class, 'destroy'])->name('pessoa.imagem.destroy');
    Route::post('/pessoa/{pessoa}/imagem', [\ByusTechnology\Gabinete\Http\Controllers\PessoaImagemController::class, 'store'])->name('pessoa.imagem.store');
    Route::resource('/pessoa', \ByusTechnology\Gabinete\Http\Controllers\PessoaController::class);

    Route::resource('/assunto', \ByusTechnology\Gabinete\Http\Controllers\AssuntoController::class);
    Route::resource('/orgao', \ByusTechnology\Gabinete\Http\Controllers\OrgaoResponsavelController::class);
    Route::resource('/etapa', \ByusTechnology\Gabinete\Http\Controllers\EtapaController::class);

    // Agenda
    Route::get('/fullcalendar', \ByusTechnology\Gabinete\Http\Controllers\FullCalendarController::class)->name('fullcalendar');
    Route::resource('/agenda', \ByusTechnology\Gabinete\Http\Controllers\AgendaController::class);

    // Configurações
    Route::post('configuracao', [\ByusTechnology\Gabinete\Http\Controllers\ConfiguracaoController::class, 'store'])->name('configuracao.store');
    Route::get('configuracao', [\ByusTechnology\Gabinete\Http\Controllers\ConfiguracaoController::class, 'index'])->name('configuracao.index');

    // Usuários
    Route::get('usuario/despersonificar', 'ByusTechnology\Gabinete\Http\Controllers\UsuarioController@despersonificar');
	Route::get('usuario/{usuario}/personificar', 'ByusTechnology\Gabinete\Http\Controllers\UsuarioController@personificar');
    Route::resource('/usuario', \ByusTechnology\Gabinete\Http\Controllers\UsuarioController::class);

    // Conta
    Route::patch('/conta', [\ByusTechnology\Gabinete\Http\Controllers\ContaController::class, 'update'])->name('conta.update');
    Route::get('/conta', [\ByusTechnology\Gabinete\Http\Controllers\ContaController::class, 'index'])->name('conta.index');

    // Prefeituras
    Route::resource('/prefeitura', \ByusTechnology\Gabinete\Http\Controllers\PrefeituraController::class);

    Route::get('/', [\ByusTechnology\Gabinete\Http\Controllers\DashboardController::class, 'index'])->name('gabinete.dashboard');
});

// Breadcrumbs
if (class_exists('Breadcrumbs')) {
    require __DIR__ . '/../routes/breadcrumbs.php';
}
