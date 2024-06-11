@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.match.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.matches.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="team_home_id">{{ trans('cruds.match.fields.team_home') }}</label>
                <select class="form-control select2 {{ $errors->has('team_home') ? 'is-invalid' : '' }}" name="team_home_id" id="team_home_id" required>
                    @foreach($team_homes as $id => $entry)
                        <option value="{{ $id }}" {{ old('team_home_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('team_home'))
                    <div class="invalid-feedback">
                        {{ $errors->first('team_home') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.match.fields.team_home_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="team_away_id">{{ trans('cruds.match.fields.team_away') }}</label>
                <select class="form-control select2 {{ $errors->has('team_away') ? 'is-invalid' : '' }}" name="team_away_id" id="team_away_id" required>
                    @foreach($team_aways as $id => $entry)
                        <option value="{{ $id }}" {{ old('team_away_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('team_away'))
                    <div class="invalid-feedback">
                        {{ $errors->first('team_away') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.match.fields.team_away_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="category_id">{{ trans('cruds.match.fields.category') }}</label>
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
                <span class="help-block">{{ trans('cruds.match.fields.category_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="competetion_id">{{ trans('cruds.match.fields.competetion') }}</label>
                <select class="form-control select2 {{ $errors->has('competetion') ? 'is-invalid' : '' }}" name="competetion_id" id="competetion_id" required>
                    @foreach($competetions as $id => $entry)
                        <option value="{{ $id }}" {{ old('competetion_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('competetion'))
                    <div class="invalid-feedback">
                        {{ $errors->first('competetion') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.match.fields.competetion_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="stage_id">{{ trans('cruds.match.fields.stage') }}</label>
                <select class="form-control select2 {{ $errors->has('stage') ? 'is-invalid' : '' }}" name="stage_id" id="stage_id" required>
                    @foreach($stages as $id => $entry)
                        <option value="{{ $id }}" {{ old('stage_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('stage'))
                    <div class="invalid-feedback">
                        {{ $errors->first('stage') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.match.fields.stage_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="start_date">{{ trans('cruds.match.fields.start_date') }}</label>
                <input class="form-control date {{ $errors->has('start_date') ? 'is-invalid' : '' }}" type="text" name="start_date" id="start_date" value="{{ old('start_date') }}" required>
                @if($errors->has('start_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('start_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.match.fields.start_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="start_time">{{ trans('cruds.match.fields.start_time') }}</label>
                <input class="form-control timepicker {{ $errors->has('start_time') ? 'is-invalid' : '' }}" type="text" name="start_time" id="start_time" value="{{ old('start_time') }}" required>
                @if($errors->has('start_time'))
                    <div class="invalid-feedback">
                        {{ $errors->first('start_time') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.match.fields.start_time_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="stadium_id">{{ trans('cruds.match.fields.stadium') }}</label>
                <select class="form-control select2 {{ $errors->has('stadium') ? 'is-invalid' : '' }}" name="stadium_id" id="stadium_id" required>
                    @foreach($stadia as $id => $entry)
                        <option value="{{ $id }}" {{ old('stadium_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('stadium'))
                    <div class="invalid-feedback">
                        {{ $errors->first('stadium') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.match.fields.stadium_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="collaborator_id">{{ trans('cruds.match.fields.collaborator') }}</label>
                <select class="form-control select2 {{ $errors->has('collaborator') ? 'is-invalid' : '' }}" name="collaborator_id" id="collaborator_id" required>
                    @foreach($collaborators as $id => $entry)
                        <option value="{{ $id }}" {{ old('collaborator_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('collaborator'))
                    <div class="invalid-feedback">
                        {{ $errors->first('collaborator') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.match.fields.collaborator_helper') }}</span>
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