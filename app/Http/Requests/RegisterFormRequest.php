<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterFormRequest extends FormRequest
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
        'username' =>['required', 'min:2','max:12'],
        'mail' => ['required','min:5','max:40','email'],
        'password' => ['required','min:8','max:20','alpha_num'],
        'passwordConfirm' => ['required','same:password','min:8','max:20'],
        'bio' => ['max:150','nullable'],
        'images' => ['max:150','nullable','image','mimes:jpeg,png,jpg'],
        ];
    }
}
