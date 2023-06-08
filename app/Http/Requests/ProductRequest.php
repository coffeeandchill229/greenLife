<?php

namespace App\Http\Requests;

use App\Rules\UpperCase;
use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'price' => 'required|numeric|max:999999|min:0',
            'stock' => 'required|numeric|min:0',
            'description' => 'required',
            'category_id' => 'required'
        ];
    }
    public function attributes(){
        return [
            'name' => 'Tên sản phẩm',
            'price' => 'Giá',
            'stock' => 'Tồn kho',
            'description' => 'Mô tả',
            'category_id' => 'Danh mục'
        ];
    }
}
