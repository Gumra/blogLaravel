<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name'=>'required|string',
            'email'=>'required|string|email|unique:users,email,'.$this->user_id,
            'user_id'=>'required|integer|exists:users,id',
            'role'=>'required|integer',
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'Поле необходимо для заполнения',
            'email.required'=>'Поле необходимо для заполнения',
            'email.email'=>'Введите корректную почту',
            'email.unique'=>'Используйте другую почту',
            'role.integer'=>'Значение роли - целое число',
            'role.required'=>'Поле необходимо для заполнения',
        ];
    }
}
