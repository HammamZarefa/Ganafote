<?php

namespace App\Http\Requests;

use App\Models\CompetitionTeam;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCompetitionTeamRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('competition_team_create');
    }

    public function rules()
    {
        return [
            'competition_id' => [
                'required',
                'integer',
            ],
            'team_id' => [
                'required',
                'integer',
            ],
            'category_id' => [
                'required',
                'integer',
            ],
            'group' => [
                'string',
                'required',
            ],
            'points' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'goals' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
