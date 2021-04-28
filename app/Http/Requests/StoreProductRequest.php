<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

// It will generate the class it has 2 methods authorize
// it means if the request it authorize at all. Yes.I changed
// it to true. It is authorize to everyone who is logged in.
// Then rules is the same array of rules.
class StoreProductRequest extends FormRequest
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
            'name' => 'required',
            'price' => 'required|numeric',
            'category_id' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ];
    }
}
