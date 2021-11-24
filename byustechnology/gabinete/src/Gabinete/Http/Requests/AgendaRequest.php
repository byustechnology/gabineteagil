<?php

namespace ByusTechnology\Gabinete\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AgendaRequest extends FormRequest
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
                Rule::unique('agendas', 'codigo')->ignore(optional($this->agenda)->codigo, 'codigo')
            ],
            'titulo' => 'required',
            'inicio_em' => 'required|date|after:yesterday',
            'inicio_em_horario' => 'required|date_format:H:i',
            'termino_em' => 'required|date|after:yesterday',
            'termino_em_horario' => 'required|date_format:H:i'
        ];
    }
}