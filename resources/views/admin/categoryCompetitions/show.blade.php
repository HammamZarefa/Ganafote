@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.categoryCompetition.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.category-competitions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.categoryCompetition.fields.id') }}
                        </th>
                        <td>
                            {{ $categoryCompetition->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.categoryCompetition.fields.category') }}
                        </th>
                        <td>
                            {{ $categoryCompetition->category->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.categoryCompetition.fields.competition') }}
                        </th>
                        <td>
                            {{ $categoryCompetition->competition->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.categoryCompetition.fields.number_of_players') }}
                        </th>
                        <td>
                            {{ $categoryCompetition->number_of_players }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.categoryCompetition.fields.half_duration') }}
                        </th>
                        <td>
                            {{ $categoryCompetition->half_duration }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.categoryCompetition.fields.number_of_teams_in_group') }}
                        </th>
                        <td>
                            {{ $categoryCompetition->number_of_teams_in_group }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.category-competitions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection