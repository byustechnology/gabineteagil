<?php

namespace ByusTechnology\Gabinete\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AssuntoRequest extends FormRequest
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
                Rule::unique('assuntos', 'codigo')->ignore(optional($this->assunto)->codigo, 'codigo')
            ],
            'titulo' => 'required',
        ];
    }
}