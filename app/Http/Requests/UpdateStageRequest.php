<?php

namespace App\Http\Requests;

use App\Models\Stage;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateStageRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('stage_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:stages,name,' . request()->route('stage')->id,
            ],
            'description' => [
                'string',
                'nullable',
            ],
        ];
    }
}
