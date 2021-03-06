<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ItemRequest extends Request
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
        'name' => 'required|min:3',
        'production_price' => 'required',
        'minimum_price' => 'required',
        'price' => 'required',
        'minimum_stock' => 'required',
        'type_id' => 'required'
        ];
    }
}
