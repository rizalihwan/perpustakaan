<?php

namespace App\Http\Requests\RegisterRequest;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string',  'max:255', 'unique:users,username'],
            'role' => ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ];
    }
}
