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
            'blood_pressure' => 'required|min:2,',
            'temperature' => 'required|min:2,',
            'respiratory_rate' => 'required|min:2,',
            'capillary_refill' => 'required|min:2,',
            'weight' => 'required|min:2,',
            'pulse_rate' => 'required|min:2,',
        ];
    }
}
