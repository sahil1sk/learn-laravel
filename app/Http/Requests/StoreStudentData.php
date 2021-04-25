<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentData extends FormRequest
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
            "name" => "required",
            "email" => "required",
            "mobile" => "required"
        ];
    }

    // helps to set the custom message
    public function messages() {
        return [
            "name.requried" => "Name is needed",
            "email.requried" => "Email is needed",
        ];
    }
}
