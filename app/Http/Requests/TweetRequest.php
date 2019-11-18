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
    //
    // }

    public function withValidator($validation)
    {
        // se crea la url del tweet a partir de la informacion recibida
        $url = "https://twitter.com/".$this->screen_name."/status/".$this->id_tweet;
        $this->merge([
            'url' =>$url
        ]);
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'id_tweet' => 'required',
            'screen_name' => 'required',
            'texto'  => 'required',
            'valoracion' => 'required'
        ];

        return $rules;
    }
    /**
     * Metodo usado para retornar los mensajes pertinentes para las validaciones fallidas
     */
    public function messages()
    {
        return [
            'id_tweet.required' => 'El indicador del Tweet es obligatorio.',
            'url.required' => 'La url del Tweet es obligatorio.',
            'screen_name.required' => 'El nombre del usuario del Tweet es obligatorio.',
            'texto.required' => 'El Texto del Tweet es obligatorio.'
        ];
    }
}
