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
        $request = $this->request;
        $rules = [];

        if ($request->has('transfer_per_day')) {
            if (!empty($request->transfer_per_day)) {
                $rules['transfer_per_day'] = "numeric";
            }
        }
        if ($request->has('call_per_day')) {
            if (!empty($request->call_per_day)) {
                $rules['call_per_day'] = "numeric";
            }
        }
        if ($request->has('rea_sign_up')) {
            if (!empty($request->rea_sign_up)) {
                $rules['rea_sign_up'] = "numeric";
            }
        }
        if ($request->has('tbd_assigned')) {
            if (!empty($request->tbd_assigned)) {
                $rules['tbd_assigned'] = "numeric";
            }
        }
        if ($request->has('no_of_matches')) {
            if (!empty($request->no_of_matches)) {
                $rules['no_of_matches'] = "numeric";
            }
        }
        if ($request->has('leads')) {
            if (!empty($request->leads)) {
                $rules['leads'] = "numeric";
            }
        }
        if ($request->has('conversations')) {
            if (!empty($request->conversations)) {
                $rules['conversations'] = "numeric";
            }
        }
        return $rules;
    }
}
