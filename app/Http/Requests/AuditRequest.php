<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuditRequest extends FormRequest
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
            'record_id' => 'required|numeric',
            'user_id' => 'required',
            'call_date' => 'required',
            'customer_name' => 'required',
            'customer_phone' => 'required',
            'recording_duration' => 'required',
            'recording_link' => 'required',
            'outcome' => 'required',
            'notes' => 'required',
        ];
        return $rules;
    }
}
