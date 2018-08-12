<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MovimentacaoFormRequest extends FormRequest
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
            'valor'             => 'required',
            'departamento_id'   => 'required',
            'funcionario_id'    => 'required',
        ];
    }
    
    public function messages()
    {
        return [
            'valor.required' => 'O campo valor é de preenchimento obrigatório!',
            'departamento_id.required' => 'O campo departamento é de preenchimento obrigatório!',
            'funcionario_id.required' => 'O campo funcionário é de preenchimento obrigatório!'
        ];
    }
}
