<?php

namespace App\Http\Requests\StudentRequest;

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
            'nisn' => 'required|min:3|unique:students,nisn',
            'first_name' => 'required|min:3|max:50',
            'last_name' => 'required|min:3|max:50',
            'gender' => 'required',
            'classroom_id' => 'required',
            'date_of_birth' => 'required|date'
        ];
    }
}
