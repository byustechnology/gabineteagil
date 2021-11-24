<?php

namespace ByusTechnology\Gabinete\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PessoaRequest extends FormRequest
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
            'codigo' => [
                Rule::unique('pessoas', 'codigo')->ignore(optional($this->pessoa)->codigo, 'codigo')
            ],
            'documento' => [
                'required',
                Rule::unique('pessoas', 'documento')->ignore(optional($this->pessoa)->documento, 'documento')
            ],
            'titulo' => 'required',
            'tipo' => 'required',
            // 'cep' => 'required',
            // 'logradouro' => 'required',
            // 'numero' => 'required',
            'bairro' => 'required',
            'cidade' => 'required',
            'estado' => 'required',
        ];
    }
}