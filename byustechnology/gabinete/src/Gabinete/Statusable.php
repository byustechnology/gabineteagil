<?php

namespace ByusTechnology\Gabinete;

abstract class Statusable
{

    /**
     * Recurso associado 
     * ao status.
     * 
     * @var mixed
     */
    protected $recurso;

    /**
     * Código associado 
     * ao status do recurso.
     * 
     * @var string
     */
    public $codigo = '';

    /**
     * Descrição associada 
     * ao status.
     * 
     * @var string
     */
    public $descricao = 'Não definido';

    /**
     * Classe CSS associada 
     * ao status.
     * 
     * @var string
     */
    public $classe;

    /**
     * Data associada ao 
     * status
     * 
     * @var \Carbon\Carbon
     */
    public $data;

    /**
     * Ícone associado ao 
     * status.
     * 
     * @var string
     */
    public $icone;
    
    public function __construct($recurso)
    {
        $this->recurso = $recurso;
        $this->processar();
    }

    protected function processar() { }

}