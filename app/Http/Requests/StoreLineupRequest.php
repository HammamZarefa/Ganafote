<?php

namespace App\Http\Requests;

use App\Models\Lineup;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreLineupRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('lineup_create');
    }

    public function rules()
    {
        return [
            'match_id' => [
                'required',
                'integer',
            ],
            'team_id' => [
                'required',
                'integer',
            ],
            'player_id' => [
                'required',
                'integer',
            ],
            'position_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
