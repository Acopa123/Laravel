<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateClientRequest extends FormRequest
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
          'business' => 'max:255|required|unique:clients',
          'RFC' => 'max:255|required',
          'address' => 'max:255|required',
          'siglas' => 'max:255|required',
        ];
    }
}
