<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
        if( $this->get('_method') === 'PATCH' || $this->get('_method') === 'POST')
        {
            $id= $this->get('id');
        } else {
            $id=' ';
        }
        return [
            'major_id' => 'required',
            'material_type_id' => 'required|digits:1',
            'share_or_ask' => 'required|digits:1',
            'free_or_paid' => 'required|digits:1',
            'content' => 'required|max:255',
            'file_id' => 'max:255',
        ];
    }
}
