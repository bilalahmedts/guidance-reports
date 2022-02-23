<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GuidanceReportRequest extends FormRequest
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
             'transfer_per_day' => 'required|numeric', 
             'call_per_day' => 'required|numeric', 
             'rea_sign_up' => 'required|numeric', 
             'tbd_assigned' => 'required|numeric', 
             'no_of_matches' => 'required|numeric', 
             'leads' => 'required|numeric', 
             'conversations' => 'required|numeric', 
             'inbound' => 'required|numeric'
        ];
    }
}
