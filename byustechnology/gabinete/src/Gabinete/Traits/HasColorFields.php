<?php

namespace ByusTechnology\Gabinete\Traits;

use ByusTechnology\Gabinete\Utils\CalcularContraste;
use Illuminate\Database\Eloquent\Model;

trait HasColorFields {

    public static function bootHasColorFields()
    {
        static::saving(function(Model $model) {
            $model->cor_texto = CalcularContraste::handle($model->cor);
        });
    }

}