<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConsultationRequest extends FormRequest
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
            'blood_pressure' => 'required|regex:/^[a-zA-Z ]+$/u|min:2,',
            'temperature' => 'required|regex:/^[a-zA-Z ]+$/u|min:2,',
            'respiratory_rate' => 'required|regex:/^[a-zA-Z ]+$/u|min:2,',
            'capillary_refill' => 'required|regex:/^[a-zA-Z ]+$/u|min:2,',
            'weight' => 'required|regex:/^[a-zA-Z ]+$/u|min:2,',
            'pulse_rate' => 'required|regex:/^[a-zA-Z ]+$/u|min:2,',

            'complaints' => 'required'
        ];
    }
}
