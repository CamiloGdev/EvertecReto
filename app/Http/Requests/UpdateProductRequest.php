<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
        $product = $this->route('product');
        return [
          //
          'ref' => ['required', 'size:10', 'unique:products,ref,' . $product->id],
          'name' => ['required', 'min:5', 'max:100'],
          'price' => ['required', 'integer', 'min:1'],
          'quantity' => ['required', 'integer', 'min:0'],
          'description' => ['required', 'min:10', 'max:250'],
        ];
    }
}
