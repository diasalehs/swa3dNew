<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class stepFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if(Auth::check()){
            if(Auth::User()->userType == 0){
                return [
                    'firstName' => 'required|regex:/^[a-zA-Z]+$/',
                    'lastName' => 'required|regex:/^[a-zA-Z]+$/',
                    'FirstNameInArabic' => 'required|alpha',
                    'LastNameInArabic' => 'required|alpha',
                    'country' => 'required',
                    'cityName' => 'required_without:x',
                    'x' => 'required_without:cityName',
                    'intrests' => 'required',
                    'targets' => 'required',
                    'gender' => 'required',
                    'currentWork' => 'required',
                    'educationalLevel' => 'required',
                    'preVoluntary' => 'required',
                    'dateOfBirth' => 'required|date|before:01/01/2010',
                    'mobileNumber' => 'required|digits:10'
                ];
            }elseif(Auth::User()->userType == 1){
                return [
                    'firstName' => 'required|regex:/^[a-zA-Z]+$/',
                    'lastName' => 'required|regex:/^[a-zA-Z]+$/',
                    'FirstNameInArabic' => 'required|alpha',
                    'LastNameInArabic' => 'required|alpha',
                    'country' => 'required',
                    'cityName' => 'required_without:x',
                    'x' => 'required_without:cityName',
                    'intrests' => 'required',
                    'targets' => 'required',
                    'livingPlace' => 'required',
                    'license' => 'required|max:10|unique:institutes',
                    'establishmentYear' => 'required|date|before:today',
                    'address' => 'required|max:30',
                    'mobileNumber' => 'required|digits:10'
                ];
            }
        }
        return[
        ];
        
    }
}
