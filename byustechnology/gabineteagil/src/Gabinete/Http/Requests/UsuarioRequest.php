<?php

namespace ByusTechnology\Gabinete\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UsuarioRequest extends FormRequest
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
        $rules = [
            'name' => 'required', 
            'email' => [
                Rule::unique('users', 'email')->ignore($this->usuario)
            ]
        ];
        
        if (request()->isMethod('post')) {
            $rules['password'] = 'required|confirmed|min:6';
        }

        if (request()->isMethod('put')) {
            $rules['password'] = 'nullable|confirmed|min:6';
        }

        return $rules;
    }
}