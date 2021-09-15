<?php

namespace ByusTechnology\Gabinete\Traits;
use Illuminate\Support\Str;

trait HasAddress {

    /**
     * Retorna o endereço completo
     * do recurso.
     * 
     * @return string
     */
    public function getEnderecoCompletoAttribute()
    {
        $logradouro = $this->logradouro ?? 'Não informado';
        $numero = $this->numero ?? 'Sem número';
        $bairro = $this->bairro ?? 'Sem bairro';
        $cidade = $this->cidade ?? 'Sem cidade';
        $estado = $this->estado ?? 'Sem estado';

        return $logradouro . ', N ' . $numero . ' - ' . $bairro . ' - ' . $cidade . '/' . $estado;
    }

    /**
     * Retorna somente o endereço com número 
     * e bairro
     * 
     * @return string
     */
    public function getEnderecoResumidoAttribute()
    {
        return Str::replace('', 'Sem logradouro', $this->logradouro) . ', N ' . Str::replace('', 'Sem número', $this->numero) . ' - ' . Str::replace('', 'Sem bairro', $this->bairro);
    }

    /**
     * Retorna somente o endereço com número 
     * e bairro
     * 
     * @return string
     */
    public function getEnderecoCidadeEstadoAttribute()
    {
        return Str::replace('', 'Sem cidade', $this->cidade) . '/' . Str::replace('', 'Sem estado', $this->estado);
    }
}