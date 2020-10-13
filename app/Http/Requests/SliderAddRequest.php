<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderAddRequest extends FormRequest
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
            'name' => 'required|unique:sliders|max:255',
            'description'=> 'required',
            'image_path'=>'required',

        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'vui lòng nhập tên slide',
            'name.unique' => 'tên sản phẩm không hợp lệ',
            'name.max' => 'tên không được phép dài quá 255 kí tự',
            'description.required' => 'vui lòng nhập mô tả cho slide',
            'image_path.required' => 'vui lòng nhập hình ảnh',

        ];
    }
}
