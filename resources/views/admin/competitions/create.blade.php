@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.competition.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.competitions.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.competition.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.competition.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="description">{{ trans('cruds.competition.fields.description') }}</label>
                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description" required>{{ old('description') }}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.competition.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="organized_by">{{ trans('cruds.competition.fields.organized_by') }}</label>
                <input class="form-control {{ $errors->has('organized_by') ? 'is-invalid' : '' }}" type="text" name="organized_by" id="organized_by" value="{{ old('organized_by', '') }}">
                @if($errors->has('organized_by'))
                    <div class="invalid-feedback">
                        {{ $errors->first('organized_by') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.competition.fields.organized_by_helper') }}</span>
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