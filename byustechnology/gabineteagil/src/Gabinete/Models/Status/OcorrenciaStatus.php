<?php

namespace ByusTechnology\Gabinete\Models\Status;

use ByusTechnology\Gabinete\Statusable;
use Carbon\Carbon;

class OcorrenciaStatus extends Statusable
{

    /**
     * Verifica o recurso, processando
     * o status atual do mesmo.
     *
     * @return void
     */
    public function processar()
    {
        if ($this->recurso->cancelada()) {
            $this->codigo = 'x';
            $this->descricao = 'Cancelada';
            $this->classe = 'success';
            $this->data = Carbon::parse($this->recurso->cancelada_em);

            return $this;
        }

        if ($this->recurso->concluida()) {
            $this->codigo = 'c';
            $this->descricao = 'Concluída';
            $this->classe = 'success';
            $this->data = Carbon::parse($this->recurso->concluida_em);

            return $this;
        }

        $this->codigo = 'a';
        $this->descricao = 'Em aberto';
        $this->classe = 'primary';
        $this->data = Carbon::parse($this->recurso->created_at);

        return $this;
    }
}