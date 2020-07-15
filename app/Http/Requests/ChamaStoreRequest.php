<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChamaStoreRequest extends FormRequest
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
            'name'=> 'required|min:3|max:50|string',
            'amount'=> 'required|min:50|max:10000|numeric',
            'description' => 'nullable|min:5|max:1000|string',
            'terms'=>'required',
            'duration'=>'required|min:1|max:120'
        ];
    }
    public function messages()
    {
        return [
            'name.required' =>"Name of the chama is required",
            'amount.required' =>"Amount of the chama is required",
            'terms.request'=>"You must agree to our terms and conditions",
            'duration.required' =>"days taken to next contribution is required",
            'duration.min' =>"minimum of days chama can take is one day",
            'duration.max' =>"maxmum  days chama can take is 120 days "
        ];
    }
}
