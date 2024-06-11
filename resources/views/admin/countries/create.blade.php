@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.country.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.countries.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.country.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.country.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="short_code">{{ trans('cruds.country.fields.short_code') }}</label>
                <input class="form-control {{ $errors->has('short_code') ? 'is-invalid' : '' }}" type="text" name="short_code" id="short_code" value="{{ old('short_code', '') }}" required>
                @if($errors->has('short_code'))
                    <div class="invalid-feedback">
                        {{ $errors->first('short_code') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.country.fields.short_code_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="nationality">{{ trans('cruds.country.fields.nationality') }}</label>
                <input class="form-control {{ $errors->has('nationality') ? 'is-invalid' : '' }}" type="text" name="nationality" id="nationality" value="{{ old('nationality', '') }}">
                @if($errors->has('nationality'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nationality') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.country.fields.nationality_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('is_default') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="is_default" value="0">
                    <input class="form-check-input" type="checkbox" name="is_default" id="is_default" value="1" {{ old('is_default', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_default">{{ trans('cruds.country.fields.is_default') }}</label>
                </div>
                @if($errors->has('is_default'))
                    <div class="invalid-feedback">
                        {{ $errors->first('is_default') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.country.fields.is_default_helper') }}</span>
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