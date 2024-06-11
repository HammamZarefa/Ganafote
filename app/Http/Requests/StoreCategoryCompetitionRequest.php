<?php

namespace App\Http\Requests;

use App\Models\CategoryCompetition;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCategoryCompetitionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('category_competition_create');
    }

    public function rules()
    {
        return [
            'category_id' => [
                'required',
                'integer',
            ],
            'competition_id' => [
                'required',
                'integer',
            ],
            'number_of_players' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'half_duration' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'number_of_teams_in_group' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
