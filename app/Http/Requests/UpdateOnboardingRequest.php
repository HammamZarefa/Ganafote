<?php

namespace App\Http\Requests;

use App\Models\Onboarding;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateOnboardingRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('onboarding_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'subtitle' => [
                'string',
                'required',
            ],
            'description' => [
                'string',
                'nullable',
            ],
        ];
    }
}
