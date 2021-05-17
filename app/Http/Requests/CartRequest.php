<?php

namespace App\Http\Requests;

use App\Rules\HasCity;
use Illuminate\Foundation\Http\FormRequest;

class CartRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email'],
            'phone' => ['required', 'regex:/^\+7\([0-9]{3}\)\-[0-9]{3}\-[0-9]{2}\-[0-9]{2,3}$/'],
            'city' => ['required', 'string', new HasCity],
            'street' => ['required', 'string'],
            'house' => ['required', 'string'],
            'flat' => ['required', 'string'],
            'address' => ['required', 'string', 'regex:/(^г\.[А-яA-z\s]+[,]{1})?(\sулица\:[\sА-яA-z0-9]+[,]{1})?(\sдом\:[\sА-яA-z0-9]+[,])?(\sквартира\:[\sА-яA-z0-9]+$)/'],
            'cart' => ['required', 'json'],
            'totalPrice' => ['required', 'integer'],
        ];
    }

    // public function messages()
    // {
    //     return [
    //         'city.hasCity' => 'Пожалуйста выберите город из всплывающего списка при вводе в поле город'
    //     ];
    // }
}
