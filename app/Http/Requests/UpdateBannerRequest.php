<?php

namespace App\Http\Requests;

use App\Models\Banner;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateBannerRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('banner_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:banners,name,' . request()->route('banner')->id,
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
