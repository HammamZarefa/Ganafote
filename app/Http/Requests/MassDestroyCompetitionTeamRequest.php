<?php

namespace App\Http\Requests;

use App\Models\CompetitionTeam;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyCompetitionTeamRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('competition_team_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:competition_teams,id',
        ];
    }
}
