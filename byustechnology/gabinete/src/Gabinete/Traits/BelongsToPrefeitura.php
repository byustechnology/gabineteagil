<?php

namespace ByusTechnology\Gabinete\Traits;

use ByusTechnology\Gabinete\Models\Prefeitura;
use ByusTechnology\Gabinete\Scopes\PrefeituraScope;

trait BelongsToPrefeitura {

	// Utilizamos a trait BelongsToTenant
	// para definirmos regras de negócio
	// específicas para modelos que necessitam
	// herdar as regras de ter um Tenant associado
	// a ele. Alterando o nome bootBelongsToTenant
    // garante que não iremos sobrescrever a função
    // principal do nosso model.
	protected static function bootBelongsToPrefeitura()
    {
        static::addGlobalScope(new PrefeituraScope);

        static::creating(function($model) {
            if ( session()->has('prefeitura')) {
                $model->prefeitura_id = session()->get('prefeitura');
            }
        });
    }

    public function prefeitura()
    {
        return $this->belongsTo(Prefeitura::class);
    }

}