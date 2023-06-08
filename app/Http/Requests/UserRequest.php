<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules()
    {
        
        return [
            'name' => 'required|min:3|max:100',
            'email' => 'required|email|unique:users,email',
            'group_id' => ['required', 'integer', function ($value, $false) {
                if ($value == 0) {
                    $false('bắt buộc phải chọn nhóm');
                }
            }],
            'status' => 'required|integer'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Bạn chưa nhập tên',
            'name.min' => 'Tên phải từ 3 đến 100 ký tự',
            'name.max' => 'Tên phải từ 3 đến 100 ký tự',

            'email.required' => 'Bạn chưa nhập email',
            'email.email' => 'Bạn chưa nhập đúng định dạng email',
            'email.unique' => 'Email đã tồn tại',
            'group_id.required' => 'Nhóm không được để trống',
            'group_id.integer' => 'Nhóm không hợp lệ',
            'status.required' => 'Trạng thái không được để trống',
            'status.integer' => 'Trạng không hợp lệ'
        ];
    }
}
