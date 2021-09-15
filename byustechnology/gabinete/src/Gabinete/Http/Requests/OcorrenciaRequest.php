<?php

namespace ByusTechnology\Gabinete\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class OcorrenciaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'pessoa_id' => 'required', 
            'assunto_id' => 'required', 
            'etapa_id' => 'required', 
            'orgao_responsavel_id' => 'required', 
            'descricao' => 'required', 

            // Endereço
            // 'cep' => 'required_if:mudar_endereco,1', 
            // 'logradouro' => 'required_if:mudar_endereco,1', 
            // 'numero' => 'required_if:mudar_endereco,1', 
            'bairro' => 'required_if:mudar_endereco,on', 
            'cidade' => 'required_if:mudar_endereco,on', 
            'estado' => 'required_if:mudar_endereco,on'
        ];
    }
}
