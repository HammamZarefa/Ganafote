<?php

namespace App\Http\Requests;

use App\Models\Client;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreClientRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('client_create');
    }

    public function rules()
    {
        return [
            'first_name' => [
                'string',
                'required',
            ],
            'last_name' => [
                'string',
                'required',
            ],
            'birth_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'email' => [
                'required',
                'unique:clients',
            ],
            'phone' => [
                'string',
                'nullable',
            ],
            'password' => [
                'required',
            ],
            'state_province' => [
                'string',
                'nullable',
            ],
            'township' => [
                'string',
                'nullable',
            ],
            'zipcode' => [
                'string',
                'nullable',
            ],
        ];
    }
}
