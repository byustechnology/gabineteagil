<?php

namespace ByusTechnology\Gabinete\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EtapaRequest extends FormRequest
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
                'required',
                Rule::unique('etapas', 'codigo')->ignore($this->etapa->codigo, 'codigo')
            ],
            'titulo' => 'required',
            'ordem' => 'required|numeric',
        ];
    }
}