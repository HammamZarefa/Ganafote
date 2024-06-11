<?php

namespace App\Http\Requests;

use App\Models\Staduim;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreStaduimRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('staduim_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:staduims',
            ],
            'address' => [
                'string',
                'nullable',
            ],
            'city' => [
                'string',
                'nullable',
            ],
        ];
    }
}
