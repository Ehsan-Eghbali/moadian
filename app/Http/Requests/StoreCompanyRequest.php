<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCompanyRequest extends FormRequest
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
           'name'=>'required',
           'tax_memory_id'=>'nullable',
           'internal_series_of_tax_memory'=>'nullable',
           'economical_number'=>'required',
           'registration_number'=>'required',
           'national_id'=>'required',
           'post_code'=>'nullable',
           'address'=>'nullable',
           'phone'=>'nullable'
        ];
    }
}
