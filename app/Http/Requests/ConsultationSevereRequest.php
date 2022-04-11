<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConsultationSevereRequest extends FormRequest
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
            //  'onset' => 'required|regex:/^[a-zA-Z ]+$/u|min:2,',
            //  'provoke' => 'required|regex:/^[a-zA-Z ]+$/u|min:2,',
            //  'quality' => 'required|regex:/^[a-zA-Z ]+$/u|min:2,',
            //  'severity' => 'required|regex:/^[a-zA-Z ]+$/u|min:2,',
            //  'last_meal' => 'required|regex:/^[a-zA-Z ]+$/u|min:2,',
            //  'time' => 'required|regex:/^[a-zA-Z ]+$/u|min:2,',
            //  'allergies' => 'required|regex:/^[a-zA-Z ]+$/u|min:2,',
            //  'past_medications' => 'required|regex:/^[a-zA-Z ]+$/u|min:2,',
            //  'leading_up_to_emergency' => 'required|regex:/^[a-zA-Z ]+$/u|min:2,',

            //  'requested_by' => 'required|regex:/^[a-zA-Z ]+$/u|min:2,',
            //  'license_number' => 'required|min:5,',
         ];
    }
}
