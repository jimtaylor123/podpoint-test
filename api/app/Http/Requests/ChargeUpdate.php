<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Charge;

class ChargeUpdate extends FormRequest
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
            // No basic validation rules at the moment ... 
        ];
    }
    
    /**
     * Configure the validator instance.
     *
     * @param  \Illuminate\Validation\Validator  $validator
     */
    public function withValidator($validator)
    {
        // check the charge has not already been ended
        $validator->after(function ($validator) {

            $chargeId =  substr( request()->path(), strrpos(request()->path(), '/') + 1);
            $charge =  Charge::findOrFail($chargeId);
            if( ! empty($charge->end)  ){
                $validator->errors()->add('charge', 'This charge has already been terminated so it is not possible to stop it.');
            }
        });
    }
}
