<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditNewsRequest extends FormRequest
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
            'name'=>'unique:vp_news,news_title,'.$this->segment(4).',news_id'
        ];
    }
    public function messages(){
        return[
            'name.unique'=>'Tên tiêu đề đã bị trùng'
        ];
    }
}
