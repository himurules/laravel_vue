<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FoodItemPost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('edit-menu');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required| max:30',
            'price' => 'required | numeric | min:0',
            'category'   => 'required',
            'description' => 'required',
            'is_active' => 'required | boolean',
            'img_src'   => 'required'
        ];
    }
}
