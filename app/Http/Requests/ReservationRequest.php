<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationRequest extends FormRequest
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
            'start_date' => 'required|date_format:Y-m-d',
            'start_time' => 'required|date_format:-H-i',
            'num_of_users' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'start_date.required' => '日付を指定してください',
            'start_time.required' => '時間を指定してください',
            'num_of_users.required' => '人数を指定してください',
        ];
    }
}
