<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class StoreShopRequest extends FormRequest
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
            'shop_name' => ['required', 'string'],
            'owner_name' => ['required', 'string'],
            'logo' => "required|mime:jpeg,jpg,png,svg,gif",
            'cover_image' => "required|mime:jpeg,jpg,png,svg,gif",
            'description' => ['required', 'string'],
            'account_holder_name' => ['required', 'string'],
            'account_holder_email' => ['required', 'email', Rule::unique('shops')],
            'bank_name' => ['required', 'string'],
            'account_number' => ['required', 'string'],
            'country' => ['required', 'string'],
            'city' => ['required', 'string'],
            'state' => ['required', 'string'],
            'address' => ['required', 'string'],
            'phone' => ['required', 'string'],
        ];
    }
    public function messages()
    {
        // return [
        //     "logo.is_base64_mime" => "Image type is not valid",
        //     "cover_image.is_base64_mime" => "Image type is not valid",
        // ];
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
