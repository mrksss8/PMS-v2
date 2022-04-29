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

            //   'onset' => 'required|min:2,',
            //   'provoke' => 'required|min:2,',
            //   'quality' => 'required|min:2,',
            //   'severity' => 'required|min:2,',
            //   'last_meal' => 'required|min:2,',
            //   'time' => 'required|min:2,',
            //   'allergies' => 'required|min:2,',
            //   'past_medications' => 'required|min:2,',
            //   'leading_up_to_emergency' => 'required|min:2,',
            //   'requested_by' => 'required|min:2,',
            //   'license_number' => 'required|min:5,',

         ];
    }
}
