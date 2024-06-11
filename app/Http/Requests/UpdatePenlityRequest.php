<?php

namespace App\Http\Requests;

use App\Models\Penlity;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePenlityRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('penlity_edit');
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
            'penlity_order' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'result' => [
                'required',
            ],
        ];
    }
}
