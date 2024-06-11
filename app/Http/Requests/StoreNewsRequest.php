<?php

namespace App\Http\Requests;

use App\Models\News;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreNewsRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('news_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:newss',
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
