<?php

namespace App\Http\Requests;

use App\Models\Stage;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreStageRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('stage_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:stages',
            ],
            'description' => [
                'string',
                'nullable',
            ],
        ];
    }
}
