@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.match.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.matches.update", [$match->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="team_home_id">{{ trans('cruds.match.fields.team_home') }}</label>
                <select class="form-control select2 {{ $errors->has('team_home') ? 'is-invalid' : '' }}" name="team_home_id" id="team_home_id" required>
                    @foreach($team_homes as $id => $entry)
                        <option value="{{ $id }}" {{ (old('team_home_id') ? old('team_home_id') : $match->team_home->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
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
                        <option value="{{ $id }}" {{ (old('team_away_id') ? old('team_away_id') : $match->team_away->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
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
                        <option value="{{ $id }}" {{ (old('category_id') ? old('category_id') : $match->category->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
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
                        <option value="{{ $id }}" {{ (old('competetion_id') ? old('competetion_id') : $match->competetion->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
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
                        <option value="{{ $id }}" {{ (old('stage_id') ? old('stage_id') : $match->stage->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
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
                <label for="status">{{ trans('cruds.match.fields.status') }}</label>
                <input class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" type="number" name="status" id="status" value="{{ old('status', $match->status) }}" step="1">
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.match.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="start_date">{{ trans('cruds.match.fields.start_date') }}</label>
                <input class="form-control date {{ $errors->has('start_date') ? 'is-invalid' : '' }}" type="text" name="start_date" id="start_date" value="{{ old('start_date', $match->start_date) }}" required>
                @if($errors->has('start_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('start_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.match.fields.start_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="start_time">{{ trans('cruds.match.fields.start_time') }}</label>
                <input class="form-control timepicker {{ $errors->has('start_time') ? 'is-invalid' : '' }}" type="text" name="start_time" id="start_time" value="{{ old('start_time', $match->start_time) }}" required>
                @if($errors->has('start_time'))
                    <div class="invalid-feedback">
                        {{ $errors->first('start_time') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.match.fields.start_time_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="home_score">{{ trans('cruds.match.fields.home_score') }}</label>
                <input class="form-control {{ $errors->has('home_score') ? 'is-invalid' : '' }}" type="number" name="home_score" id="home_score" value="{{ old('home_score', $match->home_score) }}" step="1">
                @if($errors->has('home_score'))
                    <div class="invalid-feedback">
                        {{ $errors->first('home_score') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.match.fields.home_score_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="away_score">{{ trans('cruds.match.fields.away_score') }}</label>
                <input class="form-control {{ $errors->has('away_score') ? 'is-invalid' : '' }}" type="number" name="away_score" id="away_score" value="{{ old('away_score', $match->away_score) }}" step="1">
                @if($errors->has('away_score'))
                    <div class="invalid-feedback">
                        {{ $errors->first('away_score') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.match.fields.away_score_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="home_half_score">{{ trans('cruds.match.fields.home_half_score') }}</label>
                <input class="form-control {{ $errors->has('home_half_score') ? 'is-invalid' : '' }}" type="number" name="home_half_score" id="home_half_score" value="{{ old('home_half_score', $match->home_half_score) }}" step="1">
                @if($errors->has('home_half_score'))
                    <div class="invalid-feedback">
                        {{ $errors->first('home_half_score') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.match.fields.home_half_score_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="away_half_score">{{ trans('cruds.match.fields.away_half_score') }}</label>
                <input class="form-control {{ $errors->has('away_half_score') ? 'is-invalid' : '' }}" type="number" name="away_half_score" id="away_half_score" value="{{ old('away_half_score', $match->away_half_score) }}" step="1">
                @if($errors->has('away_half_score'))
                    <div class="invalid-feedback">
                        {{ $errors->first('away_half_score') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.match.fields.away_half_score_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="home_yellow_card">{{ trans('cruds.match.fields.home_yellow_card') }}</label>
                <input class="form-control {{ $errors->has('home_yellow_card') ? 'is-invalid' : '' }}" type="number" name="home_yellow_card" id="home_yellow_card" value="{{ old('home_yellow_card', $match->home_yellow_card) }}" step="1">
                @if($errors->has('home_yellow_card'))
                    <div class="invalid-feedback">
                        {{ $errors->first('home_yellow_card') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.match.fields.home_yellow_card_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="away_yellow_card">{{ trans('cruds.match.fields.away_yellow_card') }}</label>
                <input class="form-control {{ $errors->has('away_yellow_card') ? 'is-invalid' : '' }}" type="number" name="away_yellow_card" id="away_yellow_card" value="{{ old('away_yellow_card', $match->away_yellow_card) }}" step="1">
                @if($errors->has('away_yellow_card'))
                    <div class="invalid-feedback">
                        {{ $errors->first('away_yellow_card') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.match.fields.away_yellow_card_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="home_red_card">{{ trans('cruds.match.fields.home_red_card') }}</label>
                <input class="form-control {{ $errors->has('home_red_card') ? 'is-invalid' : '' }}" type="number" name="home_red_card" id="home_red_card" value="{{ old('home_red_card', $match->home_red_card) }}" step="1">
                @if($errors->has('home_red_card'))
                    <div class="invalid-feedback">
                        {{ $errors->first('home_red_card') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.match.fields.home_red_card_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="away_red_card">{{ trans('cruds.match.fields.away_red_card') }}</label>
                <input class="form-control {{ $errors->has('away_red_card') ? 'is-invalid' : '' }}" type="number" name="away_red_card" id="away_red_card" value="{{ old('away_red_card', $match->away_red_card) }}" step="1">
                @if($errors->has('away_red_card'))
                    <div class="invalid-feedback">
                        {{ $errors->first('away_red_card') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.match.fields.away_red_card_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="home_summery">{{ trans('cruds.match.fields.home_summery') }}</label>
                <textarea class="form-control {{ $errors->has('home_summery') ? 'is-invalid' : '' }}" name="home_summery" id="home_summery">{{ old('home_summery', $match->home_summery) }}</textarea>
                @if($errors->has('home_summery'))
                    <div class="invalid-feedback">
                        {{ $errors->first('home_summery') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.match.fields.home_summery_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="away_summery">{{ trans('cruds.match.fields.away_summery') }}</label>
                <textarea class="form-control {{ $errors->has('away_summery') ? 'is-invalid' : '' }}" name="away_summery" id="away_summery">{{ old('away_summery', $match->away_summery) }}</textarea>
                @if($errors->has('away_summery'))
                    <div class="invalid-feedback">
                        {{ $errors->first('away_summery') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.match.fields.away_summery_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.match.fields.has_penlty') }}</label>
                <select class="form-control {{ $errors->has('has_penlty') ? 'is-invalid' : '' }}" name="has_penlty" id="has_penlty">
                    <option value disabled {{ old('has_penlty', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Match::HAS_PENLTY_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('has_penlty', $match->has_penlty) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('has_penlty'))
                    <div class="invalid-feedback">
                        {{ $errors->first('has_penlty') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.match.fields.has_penlty_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="end_time">{{ trans('cruds.match.fields.end_time') }}</label>
                <input class="form-control timepicker {{ $errors->has('end_time') ? 'is-invalid' : '' }}" type="text" name="end_time" id="end_time" value="{{ old('end_time', $match->end_time) }}">
                @if($errors->has('end_time'))
                    <div class="invalid-feedback">
                        {{ $errors->first('end_time') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.match.fields.end_time_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="notes">{{ trans('cruds.match.fields.notes') }}</label>
                <textarea class="form-control {{ $errors->has('notes') ? 'is-invalid' : '' }}" name="notes" id="notes">{{ old('notes', $match->notes) }}</textarea>
                @if($errors->has('notes'))
                    <div class="invalid-feedback">
                        {{ $errors->first('notes') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.match.fields.notes_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="stadium_id">{{ trans('cruds.match.fields.stadium') }}</label>
                <select class="form-control select2 {{ $errors->has('stadium') ? 'is-invalid' : '' }}" name="stadium_id" id="stadium_id" required>
                    @foreach($stadia as $id => $entry)
                        <option value="{{ $id }}" {{ (old('stadium_id') ? old('stadium_id') : $match->stadium->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
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
                        <option value="{{ $id }}" {{ (old('collaborator_id') ? old('collaborator_id') : $match->collaborator->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
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