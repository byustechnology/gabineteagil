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
            $code = static::newCode($model);
            $model->codigo = $code;
        });
    }

    /**
     * Define qual será o próximo código
     * gerado.
     * 
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return string
     */
    protected static function newCode($model)
    {
        $codigo = app('db')->table($model->getTable())->max('codigo');
        $codigo = ! empty($codigo) ? $codigo + 1 : 1;

        return $codigo;
    } 

}