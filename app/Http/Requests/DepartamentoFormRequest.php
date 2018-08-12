<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DepartamentoFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; //return \Gate::allows('register-user');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'          => 'required|min:2|max:100'
        ];
    }
    
    public function messages()
    {
        return [
            'name.required' => 'O campo nome é de preenchimento obrigatório!',
            'name.min' => 'O campo nome deve ter no mínimo 2 caracteres',
            'name.max' => 'O campo nome deve ter no máximo 100 caracteres',
        ];
    }
}
