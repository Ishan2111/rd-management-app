<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
        // return [
        //     'account_number' => 'required|digits_between:10,12',
        //     'mobile' => 'required|digits:10'
        // ];
    }

    // public function messages()
    // {
    //     return [
    //         'account_number.required' => 'એકાઉન્ટ નંબર ફીલ્ડ આવશ્યક છે.',
    //         'account_number.digits_between' => 'એકાઉન્ટ નંબર ફીલ્ડ 10 થી 12 અંકોની વચ્ચે હોવી જોઈએ.'
    //     ];
    // }
}
