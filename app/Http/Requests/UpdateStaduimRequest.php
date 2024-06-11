<?php

namespace App\Http\Requests;

use App\Models\Staduim;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateStaduimRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('staduim_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:staduims,name,' . request()->route('staduim')->id,
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
