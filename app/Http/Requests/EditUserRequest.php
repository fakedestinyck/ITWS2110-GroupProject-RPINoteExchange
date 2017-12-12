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
        $update_pass_or_not = false;
        if( $this->get('_method') ==='PATCH')
        {
            $id= $this->get('user_id');
            $newPass = $this->get('password');
            if ($newPass != ''){
                $update_pass_or_not = true;
            }else{
                $update_pass_or_not = false;
            }
        }
        else
            $id=' ';
        if ($update_pass_or_not) {
            return [
                'rin' => 'required|digits:9|unique:users,rin,' . $id . ',id',
                'name' => 'required|max:255|unique:users,name,' . $id . ',id',
                'email' => 'required|email|max:255|unique:users,email,' . $id . ',id',
                'password' => 'required|min:6|confirmed'
            ];
        } else {
            return [
                'rin' => 'required|digits:9|unique:users,rin,' . $id . ',id',
                'name' => 'required|max:255|unique:users,name,' . $id . ',id',
                'email' => 'required|email|max:255|unique:users,email,' . $id . ',id'
            ];
        }
    }
}
