<?php

namespace App\Http\Requests;

use App\Models\MatchEvent;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateMatchEventRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('match_event_edit');
    }

    public function rules()
    {
        return [
            'match_id' => [
                'required',
                'integer',
            ],
            'event_type' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'minute' => [
                'string',
                'nullable',
            ],
            'value' => [
                'string',
                'nullable',
            ],
        ];
    }
}
