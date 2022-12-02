<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class HelloWorldRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $planets = array_keys(config('planets'));

        return [
            'from' => [
                'sometimes',
                'required',
                'string',
                Rule::in($planets),
            ],
            'to' => [
                'sometimes',
                'required',
                'string',
                Rule::in($planets),
            ],
        ];
    }
}
