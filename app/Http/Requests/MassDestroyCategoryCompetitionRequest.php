<?php

namespace App\Http\Requests;

use App\Models\CategoryCompetition;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyCategoryCompetitionRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('category_competition_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:category_competitions,id',
        ];
    }
}
