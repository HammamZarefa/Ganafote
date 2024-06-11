@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.matchEvent.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.match-events.update", [$matchEvent->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="match_id">{{ trans('cruds.matchEvent.fields.match') }}</label>
                <select class="form-control select2 {{ $errors->has('match') ? 'is-invalid' : '' }}" name="match_id" id="match_id" required>
                    @foreach($matches as $id => $entry)
                        <option value="{{ $id }}" {{ (old('match_id') ? old('match_id') : $matchEvent->match->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('match'))
                    <div class="invalid-feedback">
                        {{ $errors->first('match') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.matchEvent.fields.match_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="event_type">{{ trans('cruds.matchEvent.fields.event_type') }}</label>
                <input class="form-control {{ $errors->has('event_type') ? 'is-invalid' : '' }}" type="number" name="event_type" id="event_type" value="{{ old('event_type', $matchEvent->event_type) }}" step="1" required>
                @if($errors->has('event_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('event_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.matchEvent.fields.event_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="team_id">{{ trans('cruds.matchEvent.fields.team') }}</label>
                <select class="form-control select2 {{ $errors->has('team') ? 'is-invalid' : '' }}" name="team_id" id="team_id">
                    @foreach($teams as $id => $entry)
                        <option value="{{ $id }}" {{ (old('team_id') ? old('team_id') : $matchEvent->team->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('team'))
                    <div class="invalid-feedback">
                        {{ $errors->first('team') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.matchEvent.fields.team_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="player_id">{{ trans('cruds.matchEvent.fields.player') }}</label>
                <select class="form-control select2 {{ $errors->has('player') ? 'is-invalid' : '' }}" name="player_id" id="player_id">
                    @foreach($players as $id => $entry)
                        <option value="{{ $id }}" {{ (old('player_id') ? old('player_id') : $matchEvent->player->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('player'))
                    <div class="invalid-feedback">
                        {{ $errors->first('player') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.matchEvent.fields.player_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="minute">{{ trans('cruds.matchEvent.fields.minute') }}</label>
                <input class="form-control {{ $errors->has('minute') ? 'is-invalid' : '' }}" type="text" name="minute" id="minute" value="{{ old('minute', $matchEvent->minute) }}">
                @if($errors->has('minute'))
                    <div class="invalid-feedback">
                        {{ $errors->first('minute') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.matchEvent.fields.minute_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="value">{{ trans('cruds.matchEvent.fields.value') }}</label>
                <input class="form-control {{ $errors->has('value') ? 'is-invalid' : '' }}" type="text" name="value" id="value" value="{{ old('value', $matchEvent->value) }}">
                @if($errors->has('value'))
                    <div class="invalid-feedback">
                        {{ $errors->first('value') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.matchEvent.fields.value_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="notes">{{ trans('cruds.matchEvent.fields.notes') }}</label>
                <textarea class="form-control {{ $errors->has('notes') ? 'is-invalid' : '' }}" name="notes" id="notes">{{ old('notes', $matchEvent->notes) }}</textarea>
                @if($errors->has('notes'))
                    <div class="invalid-feedback">
                        {{ $errors->first('notes') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.matchEvent.fields.notes_helper') }}</span>
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