@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.match.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.matches.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.match.fields.id') }}
                        </th>
                        <td>
                            {{ $match->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.match.fields.team_home') }}
                        </th>
                        <td>
                            {{ $match->team_home->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.match.fields.team_away') }}
                        </th>
                        <td>
                            {{ $match->team_away->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.match.fields.category') }}
                        </th>
                        <td>
                            {{ $match->category->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.match.fields.competetion') }}
                        </th>
                        <td>
                            {{ $match->competetion->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.match.fields.stage') }}
                        </th>
                        <td>
                            {{ $match->stage->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.match.fields.status') }}
                        </th>
                        <td>
                            {{ $match->status }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.match.fields.start_date') }}
                        </th>
                        <td>
                            {{ $match->start_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.match.fields.start_time') }}
                        </th>
                        <td>
                            {{ $match->start_time }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.match.fields.home_score') }}
                        </th>
                        <td>
                            {{ $match->home_score }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.match.fields.away_score') }}
                        </th>
                        <td>
                            {{ $match->away_score }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.match.fields.home_half_score') }}
                        </th>
                        <td>
                            {{ $match->home_half_score }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.match.fields.away_half_score') }}
                        </th>
                        <td>
                            {{ $match->away_half_score }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.match.fields.home_yellow_card') }}
                        </th>
                        <td>
                            {{ $match->home_yellow_card }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.match.fields.away_yellow_card') }}
                        </th>
                        <td>
                            {{ $match->away_yellow_card }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.match.fields.home_red_card') }}
                        </th>
                        <td>
                            {{ $match->home_red_card }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.match.fields.away_red_card') }}
                        </th>
                        <td>
                            {{ $match->away_red_card }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.match.fields.home_summery') }}
                        </th>
                        <td>
                            {{ $match->home_summery }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.match.fields.away_summery') }}
                        </th>
                        <td>
                            {{ $match->away_summery }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.match.fields.has_penlty') }}
                        </th>
                        <td>
                            {{ App\Models\Match::HAS_PENLTY_SELECT[$match->has_penlty] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.match.fields.end_time') }}
                        </th>
                        <td>
                            {{ $match->end_time }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.match.fields.notes') }}
                        </th>
                        <td>
                            {{ $match->notes }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.match.fields.stadium') }}
                        </th>
                        <td>
                            {{ $match->stadium->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.match.fields.collaborator') }}
                        </th>
                        <td>
                            {{ $match->collaborator->first_name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.matches.index') }}">
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
            <a class="nav-link" href="#match_match_events" role="tab" data-toggle="tab">
                {{ trans('cruds.matchEvent.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#match_penlities" role="tab" data-toggle="tab">
                {{ trans('cruds.penlity.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="match_match_events">
            @includeIf('admin.matches.relationships.matchMatchEvents', ['matchEvents' => $match->matchMatchEvents])
        </div>
        <div class="tab-pane" role="tabpanel" id="match_penlities">
            @includeIf('admin.matches.relationships.matchPenlities', ['penlities' => $match->matchPenlities])
        </div>
    </div>
</div>

@endsection