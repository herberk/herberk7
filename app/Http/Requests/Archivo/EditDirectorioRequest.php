<?php

namespace App\Http\Requests\Archivo;

use Illuminate\Foundation\Http\FormRequest;

class EditDirectorioRequest extends FormRequest
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
                'ano' => 'required|digits:4|integer|min:1990|max:'.(date('Y')+1),
                'name'=> 'required|min:3|max:25'
            ];

    }
}
