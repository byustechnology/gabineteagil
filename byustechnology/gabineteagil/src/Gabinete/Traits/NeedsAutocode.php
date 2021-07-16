<?php

namespace ByusTechnology\Gabinete\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

trait NeedsAutocode
{

    protected static function bootNeedsAutocode()
    {
        // Quando um novo recurso for criado, 
        // devemos atribuir um novo código a ele.
        static::creating(function (Model $model) {
            $code = static::newCode();
            $model->codigo = $code;
        });
    }

    /**
     * Define qual será o próximo código
     * gerado.
     * 
     * @return string
     */
    protected static function newCode()
    {
        return Str::upper(Str::random(12));
    } 

}