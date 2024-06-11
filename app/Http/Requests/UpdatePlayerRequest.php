<?php

namespace App\Http\Requests;

use App\Models\Player;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePlayerRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('player_edit');
    }

    public function rules()
    {
        return [
            'full_name' => [
                'string',
                'required',
            ],
            'number' => [
                'string',
                'required',
            ],
            'age' => [
                'string',
                'required',
            ],
            'team_id' => [
                'required',
                'integer',
            ],
            'certificate' => [
                'array',
            ],
            'height' => [
                'string',
                'nullable',
            ],
            'weight' => [
                'string',
                'nullable',
            ],
        ];
    }
}
