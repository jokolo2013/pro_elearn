<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'Fname' => 'required',
            'Lname' => 'required',
            'email' => 'required',
            'tel' => 'required',
            'pic_profile' => 'mimes:jpeg,jpg,png',
        ];
    }

    public function messages()
    {
        return [
            'Fname.required' => 'กรุณากรอกชือหนังสือ',
            'Lname.required' => 'กรุณากรอกราคา',
            'email.required' => 'กรุณาเลือกหมวดหนังสือ',
            'tel.required' => 'กรุณาเลือกหมวดหนังสือ',
            'pic_profile.mimes' => 'กรุณาเลือกไฟล์ภาพนามสกุล jpeg,jpg,png',
        ];
    }
}
