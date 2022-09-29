<?php

namespace App\Http\Requests\Order;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
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
            'fname' => ['required', 'string', 'min:3', 'max:255'],
            'lname' => ['required', 'string', 'min:3', 'max:255'],
            //'company' => ['string', 'min:3', 'max:255'],
            'phone' => ['required', 'numeric'],
            'email' => ['required', 'email'],
            'city' => ['required', 'string', 'min:3', 'max:255'],
            'state' => ['required', 'string', 'min:3', 'max:255'],
            'address1' => ['required', 'string', 'min:3', 'max:255'],
            //'address2' => ['string', 'min:3', 'max:255'],
        ];
    }
}
