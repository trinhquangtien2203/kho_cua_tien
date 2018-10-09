<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditUserRequest extends FormRequest
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
            //
            'mail'=>'unique:vp_users,email,'.$this->segment(4).',id'
        ];
    }
    public function messages(){
        return[
            'mail.unique'=>'Tên email đã bị trùng'
        ];
    }
}
