@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.competitionTeam.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.competition-teams.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="competition_id">{{ trans('cruds.competitionTeam.fields.competition') }}</label>
                <select class="form-control select2 {{ $errors->has('competition') ? 'is-invalid' : '' }}" name="competition_id" id="competition_id" required>
                    @foreach($competitions as $id => $entry)
                        <option value="{{ $id }}" {{ old('competition_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('competition'))
                    <div class="invalid-feedback">
                        {{ $errors->first('competition') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.competitionTeam.fields.competition_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="team_id">{{ trans('cruds.competitionTeam.fields.team') }}</label>
                <select class="form-control select2 {{ $errors->has('team') ? 'is-invalid' : '' }}" name="team_id" id="team_id" required>
                    @foreach($teams as $id => $entry)
                        <option value="{{ $id }}" {{ old('team_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('team'))
                    <div class="invalid-feedback">
                        {{ $errors->first('team') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.competitionTeam.fields.team_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="category_id">{{ trans('cruds.competitionTeam.fields.category') }}</label>
                <select class="form-control select2 {{ $errors->has('category') ? 'is-invalid' : '' }}" name="category_id" id="category_id" required>
                    @foreach($categories as $id => $entry)
                        <option value="{{ $id }}" {{ old('category_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('category'))
                    <div class="invalid-feedback">
                        {{ $errors->first('category') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.competitionTeam.fields.category_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="group">{{ trans('cruds.competitionTeam.fields.group') }}</label>
                <input class="form-control {{ $errors->has('group') ? 'is-invalid' : '' }}" type="text" name="group" id="group" value="{{ old('group', '') }}" required>
                @if($errors->has('group'))
                    <div class="invalid-feedback">
                        {{ $errors->first('group') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.competitionTeam.fields.group_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="points">{{ trans('cruds.competitionTeam.fields.points') }}</label>
                <input class="form-control {{ $errors->has('points') ? 'is-invalid' : '' }}" type="number" name="points" id="points" value="{{ old('points', '0') }}" step="1">
                @if($errors->has('points'))
                    <div class="invalid-feedback">
                        {{ $errors->first('points') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.competitionTeam.fields.points_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="goals">{{ trans('cruds.competitionTeam.fields.goals') }}</label>
                <input class="form-control {{ $errors->has('goals') ? 'is-invalid' : '' }}" type="number" name="goals" id="goals" value="{{ old('goals', '0') }}" step="1">
                @if($errors->has('goals'))
                    <div class="invalid-feedback">
                        {{ $errors->first('goals') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.competitionTeam.fields.goals_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection