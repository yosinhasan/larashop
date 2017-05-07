<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubscriptionRequest extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
//            'user_id' => 'required|numeric|min:1',
            'start_date' => 'date|date_format:Y-m-d',
//            'next_order_date' => 'date|date_format:Y-m-d',
            'day_iteration' => 'required|numeric|min:1',
            'activated' => 'numeric|min:0|max:1',
        ];
    }

}
