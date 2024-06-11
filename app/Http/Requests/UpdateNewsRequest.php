<?php

namespace App\Http\Requests;

use App\Models\News;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateNewsRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('news_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:newss,name,' . request()->route('news')->id,
            ],
            'content' => [
                'required',
            ],
            'button_title' => [
                'string',
                'nullable',
            ],
            'button_link' => [
                'string',
                'nullable',
            ],
            'image' => [
                'required',
            ],
        ];
    }
}
