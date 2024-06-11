<?php

namespace App\Http\Requests;

use App\Models\Onboarding;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyOnboardingRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('onboarding_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:onboardings,id',
        ];
    }
}
