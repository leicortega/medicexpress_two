<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormCreateUserRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'identificacion' => 'required|integer|unique:users',
            'email' => 'string|email|max:255|unique:users|nullable',
            'password' => 'required|string|min:8',
        ];
    }

    public function messages()
    {
        return [
            'identificacion.unique' => 'Ya existe un usuarion con esta identificación.',
            'password.min'  => 'La contraseña debe tener minimo 8 caracteres.',
            'email.unique'  => 'Ya existe un usuario con este correo.',
            'required' => 'El :attribute es requerido.'
        ];
    }
}