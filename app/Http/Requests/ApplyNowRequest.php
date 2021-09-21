<?php

namespace App\Http\Requests;

use App\Rules\RecaptchaRule;
use Illuminate\Foundation\Http\FormRequest;

class ApplyNowRequest extends FormRequest
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
            'career_id' => 'required|exists:careers,id',
            'name' => 'required',
            'email' => 'required|email',
            'contact' => 'required',
            'about' => '',
            'resume' => 'required|file',
            'q1' => 'required',
            'q2' => 'required',
            'q3' => 'required',
            'g-recaptcha-response' => ['required', new RecaptchaRule]
        ];
    }
}
