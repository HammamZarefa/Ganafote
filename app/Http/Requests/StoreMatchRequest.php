<?php

namespace App\Http\Requests;

use App\Models\Match;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreMatchRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('match_create');
    }

    public function rules()
    {
        return [
            'team_home_id' => [
                'required',
                'integer',
            ],
            'team_away_id' => [
                'required',
                'integer',
            ],
            'category_id' => [
                'required',
                'integer',
            ],
            'competetion_id' => [
                'required',
                'integer',
            ],
            'stage_id' => [
                'required',
                'integer',
            ],
            'start_date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'start_time' => [
                'required',
                'date_format:' . config('panel.time_format'),
            ],
            'stadium_id' => [
                'required',
                'integer',
            ],
            'collaborator_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
