@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.lineup.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.lineups.update", [$lineup->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="match_id">{{ trans('cruds.lineup.fields.match') }}</label>
                <select class="form-control select2 {{ $errors->has('match') ? 'is-invalid' : '' }}" name="match_id" id="match_id" required>
                    @foreach($matches as $id => $entry)
                        <option value="{{ $id }}" {{ (old('match_id') ? old('match_id') : $lineup->match->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('match'))
                    <div class="invalid-feedback">
                        {{ $errors->first('match') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.lineup.fields.match_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="team_id">{{ trans('cruds.lineup.fields.team') }}</label>
                <select class="form-control select2 {{ $errors->has('team') ? 'is-invalid' : '' }}" name="team_id" id="team_id" required>
                    @foreach($teams as $id => $entry)
                        <option value="{{ $id }}" {{ (old('team_id') ? old('team_id') : $lineup->team->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('team'))
                    <div class="invalid-feedback">
                        {{ $errors->first('team') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.lineup.fields.team_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="player_id">{{ trans('cruds.lineup.fields.player') }}</label>
                <select class="form-control select2 {{ $errors->has('player') ? 'is-invalid' : '' }}" name="player_id" id="player_id" required>
                    @foreach($players as $id => $entry)
                        <option value="{{ $id }}" {{ (old('player_id') ? old('player_id') : $lineup->player->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('player'))
                    <div class="invalid-feedback">
                        {{ $errors->first('player') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.lineup.fields.player_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="position_id">{{ trans('cruds.lineup.fields.position') }}</label>
                <select class="form-control select2 {{ $errors->has('position') ? 'is-invalid' : '' }}" name="position_id" id="position_id" required>
                    @foreach($positions as $id => $entry)
                        <option value="{{ $id }}" {{ (old('position_id') ? old('position_id') : $lineup->position->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('position'))
                    <div class="invalid-feedback">
                        {{ $errors->first('position') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.lineup.fields.position_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('is_starter') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="is_starter" value="0">
                    <input class="form-check-input" type="checkbox" name="is_starter" id="is_starter" value="1" {{ $lineup->is_starter || old('is_starter', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_starter">{{ trans('cruds.lineup.fields.is_starter') }}</label>
                </div>
                @if($errors->has('is_starter'))
                    <div class="invalid-feedback">
                        {{ $errors->first('is_starter') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.lineup.fields.is_starter_helper') }}</span>
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