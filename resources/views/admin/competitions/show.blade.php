@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.competition.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.competitions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.competition.fields.id') }}
                        </th>
                        <td>
                            {{ $competition->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.competition.fields.name') }}
                        </th>
                        <td>
                            {{ $competition->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.competition.fields.description') }}
                        </th>
                        <td>
                            {{ $competition->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.competition.fields.organized_by') }}
                        </th>
                        <td>
                            {{ $competition->organized_by }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.competitions.index') }}">
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
            <a class="nav-link" href="#competition_category_competitions" role="tab" data-toggle="tab">
                {{ trans('cruds.categoryCompetition.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#competition_competition_teams" role="tab" data-toggle="tab">
                {{ trans('cruds.competitionTeam.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#competetion_matches" role="tab" data-toggle="tab">
                {{ trans('cruds.match.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="competition_category_competitions">
            @includeIf('admin.competitions.relationships.competitionCategoryCompetitions', ['categoryCompetitions' => $competition->competitionCategoryCompetitions])
        </div>
        <div class="tab-pane" role="tabpanel" id="competition_competition_teams">
            @includeIf('admin.competitions.relationships.competitionCompetitionTeams', ['competitionTeams' => $competition->competitionCompetitionTeams])
        </div>
        <div class="tab-pane" role="tabpanel" id="competetion_matches">
            @includeIf('admin.competitions.relationships.competetionMatches', ['matches' => $competition->competetionMatches])
        </div>
    </div>
</div>

@endsection