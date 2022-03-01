<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            //
            'ref' => ['required', 'size:10', Rule::unique('products')],
            'name' => ['required', 'min:5', 'max:100'],
            'price' => ['required', 'integer', 'min:1'],
            'quantity' => ['required', 'integer', 'min:0'],
            'description' => ['required', 'min:10', 'max:250'],
            /*'images' => ['required', 'array'],
            'images.*' => [
                'image',
                'max:200',
                Rule::dimensions()->maxWidth(500)->maxHeight(250)->ratio(2/1),
            ]*/
        ];
    }
}
