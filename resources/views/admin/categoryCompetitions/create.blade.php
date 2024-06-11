@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.categoryCompetition.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.category-competitions.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="category_id">{{ trans('cruds.categoryCompetition.fields.category') }}</label>
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
                <span class="help-block">{{ trans('cruds.categoryCompetition.fields.category_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="competition_id">{{ trans('cruds.categoryCompetition.fields.competition') }}</label>
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
                <span class="help-block">{{ trans('cruds.categoryCompetition.fields.competition_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="number_of_players">{{ trans('cruds.categoryCompetition.fields.number_of_players') }}</label>
                <input class="form-control {{ $errors->has('number_of_players') ? 'is-invalid' : '' }}" type="number" name="number_of_players" id="number_of_players" value="{{ old('number_of_players', '7') }}" step="1">
                @if($errors->has('number_of_players'))
                    <div class="invalid-feedback">
                        {{ $errors->first('number_of_players') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.categoryCompetition.fields.number_of_players_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="half_duration">{{ trans('cruds.categoryCompetition.fields.half_duration') }}</label>
                <input class="form-control {{ $errors->has('half_duration') ? 'is-invalid' : '' }}" type="number" name="half_duration" id="half_duration" value="{{ old('half_duration', '') }}" step="1" required>
                @if($errors->has('half_duration'))
                    <div class="invalid-feedback">
                        {{ $errors->first('half_duration') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.categoryCompetition.fields.half_duration_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="number_of_teams_in_group">{{ trans('cruds.categoryCompetition.fields.number_of_teams_in_group') }}</label>
                <input class="form-control {{ $errors->has('number_of_teams_in_group') ? 'is-invalid' : '' }}" type="number" name="number_of_teams_in_group" id="number_of_teams_in_group" value="{{ old('number_of_teams_in_group', '4') }}" step="1">
                @if($errors->has('number_of_teams_in_group'))
                    <div class="invalid-feedback">
                        {{ $errors->first('number_of_teams_in_group') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.categoryCompetition.fields.number_of_teams_in_group_helper') }}</span>
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