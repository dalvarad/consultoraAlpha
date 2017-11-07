<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;


class EmpleadoRequest extends Request
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
            'first_name' => 'min:4|max:120|alpha|required',
            'last_name' => 'min:4|max:120|alpha|required',
            'rut' => 'max:12|required|unique:empleado|cl_rut',
        ];
    }
}