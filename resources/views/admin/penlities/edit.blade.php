@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.penlity.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.penlities.update", [$penlity->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="match_id">{{ trans('cruds.penlity.fields.match') }}</label>
                <select class="form-control select2 {{ $errors->has('match') ? 'is-invalid' : '' }}" name="match_id" id="match_id" required>
                    @foreach($matches as $id => $entry)
                        <option value="{{ $id }}" {{ (old('match_id') ? old('match_id') : $penlity->match->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('match'))
                    <div class="invalid-feedback">
                        {{ $errors->first('match') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.penlity.fields.match_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="team_id">{{ trans('cruds.penlity.fields.team') }}</label>
                <select class="form-control select2 {{ $errors->has('team') ? 'is-invalid' : '' }}" name="team_id" id="team_id" required>
                    @foreach($teams as $id => $entry)
                        <option value="{{ $id }}" {{ (old('team_id') ? old('team_id') : $penlity->team->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('team'))
                    <div class="invalid-feedback">
                        {{ $errors->first('team') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.penlity.fields.team_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="player_id">{{ trans('cruds.penlity.fields.player') }}</label>
                <select class="form-control select2 {{ $errors->has('player') ? 'is-invalid' : '' }}" name="player_id" id="player_id" required>
                    @foreach($players as $id => $entry)
                        <option value="{{ $id }}" {{ (old('player_id') ? old('player_id') : $penlity->player->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('player'))
                    <div class="invalid-feedback">
                        {{ $errors->first('player') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.penlity.fields.player_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="penlity_order">{{ trans('cruds.penlity.fields.penlity_order') }}</label>
                <input class="form-control {{ $errors->has('penlity_order') ? 'is-invalid' : '' }}" type="number" name="penlity_order" id="penlity_order" value="{{ old('penlity_order', $penlity->penlity_order) }}" step="1">
                @if($errors->has('penlity_order'))
                    <div class="invalid-feedback">
                        {{ $errors->first('penlity_order') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.penlity.fields.penlity_order_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('result') ? 'is-invalid' : '' }}">
                    <input class="form-check-input" type="checkbox" name="result" id="result" value="1" {{ $penlity->result || old('result', 0) === 1 ? 'checked' : '' }} required>
                    <label class="required form-check-label" for="result">{{ trans('cruds.penlity.fields.result') }}</label>
                </div>
                @if($errors->has('result'))
                    <div class="invalid-feedback">
                        {{ $errors->first('result') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.penlity.fields.result_helper') }}</span>
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