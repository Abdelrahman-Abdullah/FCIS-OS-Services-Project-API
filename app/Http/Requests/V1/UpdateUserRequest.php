<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'     => ['required' , 'min:3'   ,'max:255'],
            'password' => ['required' , 'min:8'   ,'max:255'],
            'address'  => ['required' , 'min:15'  ,'max:255'],
            'phone'    => ['required' , 'min:11'],
            'bio'      => ['nullable'],
            'thumbnail'=> ['nullable'],
            'jobName'  => ['nullable']
        ];

    }
}
