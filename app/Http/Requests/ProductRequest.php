<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'categoryId'    => 'required',
            'name'          => 'required|min:2',
            'price'         => 'required|max:5',
            'weight'        => 'required',
            'description'   => 'required',
            'image'         => 'image|mimes:jpeg,png,jpg,gif,svg'
         ];
    }
}
