@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.competitionTeam.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.competition-teams.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.competitionTeam.fields.id') }}
                        </th>
                        <td>
                            {{ $competitionTeam->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.competitionTeam.fields.competition') }}
                        </th>
                        <td>
                            {{ $competitionTeam->competition->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.competitionTeam.fields.team') }}
                        </th>
                        <td>
                            {{ $competitionTeam->team->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.competitionTeam.fields.category') }}
                        </th>
                        <td>
                            {{ $competitionTeam->category->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.competitionTeam.fields.group') }}
                        </th>
                        <td>
                            {{ $competitionTeam->group }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.competitionTeam.fields.play') }}
                        </th>
                        <td>
                            {{ $competitionTeam->play }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.competitionTeam.fields.points') }}
                        </th>
                        <td>
                            {{ $competitionTeam->points }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.competitionTeam.fields.goals') }}
                        </th>
                        <td>
                            {{ $competitionTeam->goals }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.competitionTeam.fields.goal_gainst') }}
                        </th>
                        <td>
                            {{ $competitionTeam->goal_gainst }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.competitionTeam.fields.win') }}
                        </th>
                        <td>
                            {{ $competitionTeam->win }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.competitionTeam.fields.lose') }}
                        </th>
                        <td>
                            {{ $competitionTeam->lose }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.competitionTeam.fields.draw') }}
                        </th>
                        <td>
                            {{ $competitionTeam->draw }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.competitionTeam.fields.yellow_cards') }}
                        </th>
                        <td>
                            {{ $competitionTeam->yellow_cards }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.competitionTeam.fields.red_cards') }}
                        </th>
                        <td>
                            {{ $competitionTeam->red_cards }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.competitionTeam.fields.top_scorer') }}
                        </th>
                        <td>
                            {{ $competitionTeam->top_scorer->full_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.competitionTeam.fields.top_scorer_goals') }}
                        </th>
                        <td>
                            {{ $competitionTeam->top_scorer_goals }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.competition-teams.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection