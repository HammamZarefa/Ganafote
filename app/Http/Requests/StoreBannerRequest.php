<?php

namespace App\Http\Requests;

use App\Models\Banner;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreBannerRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('banner_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:banners',
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
