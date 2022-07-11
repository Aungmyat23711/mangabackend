<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreAuthRequest extends FormRequest
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
        $role=$this->role;
        return [
            'email'=>['required',Rule::unique('auths')->where(function($query) use ($role){
                return $query->where('role',$role);
               })],
            'name'=>['required'],
            'password'=>['required'],
            'phone'=>['required']
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            "status" => "error",
            "message" => "Validation Error",
            "error" => $validator->errors(),
            "status_code" => 422
        ], 422));
    }
}
