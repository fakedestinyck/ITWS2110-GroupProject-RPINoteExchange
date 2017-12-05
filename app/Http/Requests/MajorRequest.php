<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MajorRequest extends FormRequest
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
        if( $this->get('_method') ==='PATCH')
        {
            $id= $this->get('major_id');
        } else {
            $id=' ';
        }
        return [
            'major_name' => 'required|max:255|unique:majors,name,' . $id . ',id'
        ];
    }
}
