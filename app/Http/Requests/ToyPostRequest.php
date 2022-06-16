<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ToyPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:300|min:10|alpha_dash',
            'price' => 'required|numeric',
            'type_id' => 'required|numeric',
            'material_id' => 'required',
            'description' => 'required|max:2000|min:10|alpha_dash'
        ];
    }
}
