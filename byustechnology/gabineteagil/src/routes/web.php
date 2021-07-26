<?php

Route::prefix(config('gabinete.path'))->middleware(['web', 'auth'])->group(function () {
    
    Route::post('/ocorrencia/{ocorrencia}/cancelar', [\ByusTechnology\Gabinete\Http\Controllers\OcorrenciaAcaoController::class, 'cancelar'])->name('ocorrencia.cancelar');
    Route::post('/ocorrencia/{ocorrencia}/concluir', [\ByusTechnology\Gabinete\Http\Controllers\OcorrenciaAcaoController::class, 'concluir'])->name('ocorrencia.concluir');
    Route::post('/ocorrencia/{ocorrencia}/etapa/escolher', [\ByusTechnology\Gabinete\Http\Controllers\OcorrenciaAcaoController::class, 'escolher'])->name('ocorrencia.etapa.escolher');
    Route::post('/ocorrencia/{ocorrencia}/etapa/avancar', [\ByusTechnology\Gabinete\Http\Controllers\OcorrenciaAcaoController::class, 'avancar'])->name('ocorrencia.etapa.avancar');
    Route::name('ocorrencia')->resource('/ocorrencia/{ocorrencia}/arquivo', \ByusTechnology\Gabinete\Http\Controllers\OcorrenciaArquivoController::class)->except(['edit', 'update']);
    Route::name('ocorrencia')->resource('/ocorrencia/{ocorrencia}/mensagem', \ByusTechnology\Gabinete\Http\Controllers\OcorrenciaMensagemController::class);
    Route::resource('/ocorrencia', \ByusTechnology\Gabinete\Http\Controllers\OcorrenciaController::class, ['parameters' => ['ocorrencia' => 'ocorrencia']]);
    Route::name('pessoa')->resource('/pessoa/{pessoa}/contato', \ByusTechnology\Gabinete\Http\Controllers\PessoaContatoController::class);
    Route::resource('/pessoa', \ByusTechnology\Gabinete\Http\Controllers\PessoaController::class);
    Route::resource('/assunto', \ByusTechnology\Gabinete\Http\Controllers\AssuntoController::class);
    Route::resource('/orgao', \ByusTechnology\Gabinete\Http\Controllers\OrgaoResponsavelController::class);
    Route::resource('/etapa', \ByusTechnology\Gabinete\Http\Controllers\EtapaController::class);
    Route::resource('/agenda', \ByusTechnology\Gabinete\Http\Controllers\AgendaController::class);
    Route::get('/', [\ByusTechnology\Gabinete\Http\Controllers\DashboardController::class, 'index'])->name('gabinete.dashboard');
});

// Breadcrumbs
if (class_exists('Breadcrumbs')) {
    require __DIR__ . '/../routes/breadcrumbs.php';
}
