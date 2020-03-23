<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'login' => 'bail|required|between:5,20|alpha',
            'mail' => 'bail|required|email',
            'password' => 'bail|required|string|min:8|confirmed',
            'password-confirmation' => 'bail|required|same:password'
        ];
    }
}
