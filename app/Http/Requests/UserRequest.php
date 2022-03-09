<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $rules = [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|alpha_num',
            'hrms_id' => 'required|unique:users',
            'team_id' => 'required',
            'role' => 'required',
            'status' => 'required'
        ];
        if ($this->getMethod() == "PUT") {
            $rules['status'] = 'required:users,status,' . $this->users->id;
            $rules['hrms_id'] = 'required:users,hrms_id,' . $this->users->id;
            $rules['team_id'] = 'required:users,team_id,' . $this->users->id;
            $rules['role'] = 'required:users,role,' . $this->users->id;
        }

        return $rules;
    }
}
