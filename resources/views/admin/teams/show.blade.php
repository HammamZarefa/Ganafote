@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.team.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.teams.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.team.fields.id') }}
                        </th>
                        <td>
                            {{ $team->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.team.fields.name') }}
                        </th>
                        <td>
                            {{ $team->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.team.fields.description') }}
                        </th>
                        <td>
                            {{ $team->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.team.fields.logo') }}
                        </th>
                        <td>
                            @if($team->logo)
                                <a href="{{ $team->logo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $team->logo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.teams.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#team_players" role="tab" data-toggle="tab">
                {{ trans('cruds.player.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#team_competition_teams" role="tab" data-toggle="tab">
                {{ trans('cruds.competitionTeam.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="team_players">
            @includeIf('admin.teams.relationships.teamPlayers', ['players' => $team->teamPlayers])
        </div>
        <div class="tab-pane" role="tabpanel" id="team_competition_teams">
            @includeIf('admin.teams.relationships.teamCompetitionTeams', ['competitionTeams' => $team->teamCompetitionTeams])
        </div>
    </div>
</div>

@endsection