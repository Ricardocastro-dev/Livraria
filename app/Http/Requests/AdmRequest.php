<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class AdmRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $admId= $this->route('adm');

        return [
            'name'=>'required',
            'email'=>'required|email|unique:users,email, '. ($admId ? $admId->id : null),
            'password'=>'required|min:6',
            //
        ];
    }
    public function messages(): array
    {
        return[
            'name.required'=>'campo nome é obrigatório',
        ];

    }
}
