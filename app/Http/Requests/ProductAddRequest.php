<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductAddRequest extends FormRequest
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
            'name' => 'bail|required|unique:products|max:1000|min:1',
            'price'=> 'required',
           'category_id'=>'required',
            'contents'=>'required',
            'content2s'=>'required',

        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'tên sản phẩm không hợp lệ',
            'name.unique' => 'tên sản phẩm không hợp lệ',
            'name.max' => 'tên không được phép dài quá 255 kí tự',
            'name.min' => 'tên không được phép dài dưới 10 kí tự',
            'category_id.required' => 'danh mục sản phẩm không hợp lệ',
            'contents.required' => 'nội dung sản phẩm không hợp lệ',
            'content2s.required' => 'nội dung sản phẩm không hợp lệ',
            'price.required' => 'giá sản phẩm không hợp lệ'

        ];
    }
}
