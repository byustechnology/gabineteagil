<?php

namespace ByusTechnology\Gabinete\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

trait HasStatus
{
    /**
     * Recebe o status 
     * do recurso.
     * 
     * @var \ByusTechnology\Gabinete\Statusable
     */
    public $status;

    protected static function bootHasStatus()
    {
        // Ao retornarmos o recurso, sempre iremos
        // verificar o status do mesmo, evitando que
        // seja chamado a função status, toda vez
        // que formos verificar o status do recurso.
        static::retrieved(function (Model $model) {
            $class = static::newStatus();
            $model->status = (new $class($model));
        });
    }

    /**
     * Define onde devemos procurar a 
     * classe relacionada ao status do 
     * nosso recurso. Você pode sobrescrever 
     * esse método no seu recurso, caso 
     * o namespace e o nome da classe não sigam 
     * as convensões padrões.
     * 
     * @return string
     */
    protected static function newStatus()
    {
        $class = static::class;
        return Str::beforeLast($class, '\\') . '\\Status\\' . Str::afterLast($class, '\\') . 'Status';
    } 

}