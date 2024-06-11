<?php

namespace App\Http\Requests;

use App\Models\Penlity;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyPenlityRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('penlity_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:penlities,id',
        ];
    }
}
