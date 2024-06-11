<?php

namespace App\Http\Requests;

use App\Models\Staduim;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyStaduimRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('staduim_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:staduims,id',
        ];
    }
}
