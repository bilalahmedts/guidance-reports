<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

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
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success'   => false,
            'message'   => 'Validation errors',
            'data'      => $validator->errors()
        ]));
    }
    public function messages() //OPTIONAL
    {
        return [
            'name.required' => 'Name is required',
            'name.name' => 'Name is not correct',
            'email.required' => 'Email is required',
            'email.email' => 'Email is not correct',
            'password.required' => 'Password is required',
            'password.password' => 'Password Incorrect',

            'hrms_id.required' => 'HRMS Id is required',
            'team_id.required' => 'Team Id is required',
            'role.required' => 'Role is required',
            'status.required' => 'Status is required',
        ];
    }
}
