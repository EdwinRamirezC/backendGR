<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\BaseFormRequest;

class TweetRequest extends BaseFormRequest
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
     * Metodo para tratar los datos antes de realizar las validaciones
     */
    // public function prepareForValidation()
    // {
    //     // dd("antes");
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            "var1" => "required"
        ];

        return $rules;
    }
    /**
     * Metodo usado para retornar los mensajes pertinentes para las validaciones fallidas
     */
    public function messages()
    {
        return [
            'var1.required' => 'El :attribute es obligatorio.'
        ];
    }

      /**
     *  Filters to be applied to the input.
     *
     * @return array
     */
    public function filters()
    {
        return [
            'var1' => 'trim|lowercase',
        ];
    }
}
