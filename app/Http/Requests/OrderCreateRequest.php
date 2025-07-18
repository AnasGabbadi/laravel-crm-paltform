<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderCreateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'first_name' =>'required',
            'last_name' =>'required',
            'phone_number' =>'required',
            'address' =>'required',
            'city' =>'required',
            'quantity' =>'required',
            'condition' =>'required',
            'barcode' =>'required',
            'user_id'=>'exists:users,id',
        ];
    }
}
