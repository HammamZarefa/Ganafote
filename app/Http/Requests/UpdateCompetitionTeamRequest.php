<?php

namespace App\Http\Requests;

use App\Models\CompetitionTeam;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCompetitionTeamRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('competition_team_edit');
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
            'play' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
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
            'goal_gainst' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'win' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'lose' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'draw' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'yellow_cards' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'red_cards' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'top_scorer_goals' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
