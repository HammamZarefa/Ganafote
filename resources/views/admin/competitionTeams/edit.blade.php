@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.competitionTeam.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.competition-teams.update", [$competitionTeam->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="competition_id">{{ trans('cruds.competitionTeam.fields.competition') }}</label>
                <select class="form-control select2 {{ $errors->has('competition') ? 'is-invalid' : '' }}" name="competition_id" id="competition_id" required>
                    @foreach($competitions as $id => $entry)
                        <option value="{{ $id }}" {{ (old('competition_id') ? old('competition_id') : $competitionTeam->competition->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
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
                        <option value="{{ $id }}" {{ (old('team_id') ? old('team_id') : $competitionTeam->team->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
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
                        <option value="{{ $id }}" {{ (old('category_id') ? old('category_id') : $competitionTeam->category->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
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
                <input class="form-control {{ $errors->has('group') ? 'is-invalid' : '' }}" type="text" name="group" id="group" value="{{ old('group', $competitionTeam->group) }}" required>
                @if($errors->has('group'))
                    <div class="invalid-feedback">
                        {{ $errors->first('group') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.competitionTeam.fields.group_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="play">{{ trans('cruds.competitionTeam.fields.play') }}</label>
                <input class="form-control {{ $errors->has('play') ? 'is-invalid' : '' }}" type="number" name="play" id="play" value="{{ old('play', $competitionTeam->play) }}" step="1">
                @if($errors->has('play'))
                    <div class="invalid-feedback">
                        {{ $errors->first('play') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.competitionTeam.fields.play_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="points">{{ trans('cruds.competitionTeam.fields.points') }}</label>
                <input class="form-control {{ $errors->has('points') ? 'is-invalid' : '' }}" type="number" name="points" id="points" value="{{ old('points', $competitionTeam->points) }}" step="1">
                @if($errors->has('points'))
                    <div class="invalid-feedback">
                        {{ $errors->first('points') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.competitionTeam.fields.points_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="goals">{{ trans('cruds.competitionTeam.fields.goals') }}</label>
                <input class="form-control {{ $errors->has('goals') ? 'is-invalid' : '' }}" type="number" name="goals" id="goals" value="{{ old('goals', $competitionTeam->goals) }}" step="1">
                @if($errors->has('goals'))
                    <div class="invalid-feedback">
                        {{ $errors->first('goals') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.competitionTeam.fields.goals_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="goal_gainst">{{ trans('cruds.competitionTeam.fields.goal_gainst') }}</label>
                <input class="form-control {{ $errors->has('goal_gainst') ? 'is-invalid' : '' }}" type="number" name="goal_gainst" id="goal_gainst" value="{{ old('goal_gainst', $competitionTeam->goal_gainst) }}" step="1">
                @if($errors->has('goal_gainst'))
                    <div class="invalid-feedback">
                        {{ $errors->first('goal_gainst') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.competitionTeam.fields.goal_gainst_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="win">{{ trans('cruds.competitionTeam.fields.win') }}</label>
                <input class="form-control {{ $errors->has('win') ? 'is-invalid' : '' }}" type="number" name="win" id="win" value="{{ old('win', $competitionTeam->win) }}" step="1">
                @if($errors->has('win'))
                    <div class="invalid-feedback">
                        {{ $errors->first('win') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.competitionTeam.fields.win_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="lose">{{ trans('cruds.competitionTeam.fields.lose') }}</label>
                <input class="form-control {{ $errors->has('lose') ? 'is-invalid' : '' }}" type="number" name="lose" id="lose" value="{{ old('lose', $competitionTeam->lose) }}" step="1">
                @if($errors->has('lose'))
                    <div class="invalid-feedback">
                        {{ $errors->first('lose') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.competitionTeam.fields.lose_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="draw">{{ trans('cruds.competitionTeam.fields.draw') }}</label>
                <input class="form-control {{ $errors->has('draw') ? 'is-invalid' : '' }}" type="number" name="draw" id="draw" value="{{ old('draw', $competitionTeam->draw) }}" step="1">
                @if($errors->has('draw'))
                    <div class="invalid-feedback">
                        {{ $errors->first('draw') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.competitionTeam.fields.draw_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="yellow_cards">{{ trans('cruds.competitionTeam.fields.yellow_cards') }}</label>
                <input class="form-control {{ $errors->has('yellow_cards') ? 'is-invalid' : '' }}" type="number" name="yellow_cards" id="yellow_cards" value="{{ old('yellow_cards', $competitionTeam->yellow_cards) }}" step="1">
                @if($errors->has('yellow_cards'))
                    <div class="invalid-feedback">
                        {{ $errors->first('yellow_cards') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.competitionTeam.fields.yellow_cards_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="red_cards">{{ trans('cruds.competitionTeam.fields.red_cards') }}</label>
                <input class="form-control {{ $errors->has('red_cards') ? 'is-invalid' : '' }}" type="number" name="red_cards" id="red_cards" value="{{ old('red_cards', $competitionTeam->red_cards) }}" step="1">
                @if($errors->has('red_cards'))
                    <div class="invalid-feedback">
                        {{ $errors->first('red_cards') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.competitionTeam.fields.red_cards_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="top_scorer_id">{{ trans('cruds.competitionTeam.fields.top_scorer') }}</label>
                <select class="form-control select2 {{ $errors->has('top_scorer') ? 'is-invalid' : '' }}" name="top_scorer_id" id="top_scorer_id">
                    @foreach($top_scorers as $id => $entry)
                        <option value="{{ $id }}" {{ (old('top_scorer_id') ? old('top_scorer_id') : $competitionTeam->top_scorer->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('top_scorer'))
                    <div class="invalid-feedback">
                        {{ $errors->first('top_scorer') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.competitionTeam.fields.top_scorer_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="top_scorer_goals">{{ trans('cruds.competitionTeam.fields.top_scorer_goals') }}</label>
                <input class="form-control {{ $errors->has('top_scorer_goals') ? 'is-invalid' : '' }}" type="number" name="top_scorer_goals" id="top_scorer_goals" value="{{ old('top_scorer_goals', $competitionTeam->top_scorer_goals) }}" step="1">
                @if($errors->has('top_scorer_goals'))
                    <div class="invalid-feedback">
                        {{ $errors->first('top_scorer_goals') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.competitionTeam.fields.top_scorer_goals_helper') }}</span>
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