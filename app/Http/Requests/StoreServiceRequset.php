<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Lang;
class StoreServiceRequset extends FormRequest
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
            'company_nam'=>'required|string|min:3|max:150',
            'activity_type'=>'required|string|min:3|:max:150',
            'number_call'=>'required|regex:/(01)[0-9]{9}/',
            'email'=>'required|email',
            'FILES'=>'required',
        ];
        
    } #-- end rules


    public function messages()
    {
        return [
            'required' => Lang::get('contacts/Messages.requireds'),
            
            'company_nam.string' => Lang::get('contacts/Messages.string'),
            'company_nam.max' => Lang::get('contacts/Messages.maxs'),
            'company_nam.min' => Lang::get('contacts/Messages.mins'),

            'activity_type.string' => Lang::get('contacts/Messages.string'),
            'activity_type.max' => Lang::get('contacts/Messages.maxs'),
            'activity_type.min' => Lang::get('contacts/Messages.mins'),

            'number_call.regex' => Lang::get('contacts/Messages.regex'),
            
            'email.email' => Lang::get('contacts/Messages.Emails'),
        ];
        
    } #-- end messages
}
