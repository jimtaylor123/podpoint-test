<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Unit;

class ChargeStore extends FormRequest
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
        // check a charge does not already exist
        $validator->after(function ($validator) {

            $id =  substr( request()->path(), strrpos(request()->path(), '/') + 1);
            $unit =  Unit::findOrFail($id);
            
            $currentCharges = $unit->charges->filter(function($charge){
                return empty($charge->end);
            });

            if( $unit->status == 'charging' || count($currentCharges) > 0  ){
                $validator->errors()->add('charge', 'This unit is already being charged. You cannot add another charge until the current one ends.');
            }
        });
    }
}
