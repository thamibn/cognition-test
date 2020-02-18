<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTicket extends FormRequest
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
            'ticket_number' => 'required|min:3|max:225|unique:tickets',
            'complainant_fullname' => 'required|min:3|string|max:225',
            'complainant_email' => 'required|min:3|email|max:225',
            'complainant_tel' => 'required|digits_between:1,15',
            'message' => 'required|min:3|max:225',
            'category_id' => 'required|integer'
        ];
    }
}
