<?php

namespace App\Http\Requests;

use App\Models\Match;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateMatchRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('match_edit');
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
            'status' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'start_date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'start_time' => [
                'required',
                'date_format:' . config('panel.time_format'),
            ],
            'home_score' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'away_score' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'home_half_score' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'away_half_score' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'home_yellow_card' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'away_yellow_card' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'home_red_card' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'away_red_card' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'end_time' => [
                'date_format:' . config('panel.time_format'),
                'nullable',
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
