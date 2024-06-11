@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.onboarding.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.onboardings.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.onboarding.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.onboarding.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="subtitle">{{ trans('cruds.onboarding.fields.subtitle') }}</label>
                <input class="form-control {{ $errors->has('subtitle') ? 'is-invalid' : '' }}" type="text" name="subtitle" id="subtitle" value="{{ old('subtitle', '') }}" required>
                @if($errors->has('subtitle'))
                    <div class="invalid-feedback">
                        {{ $errors->first('subtitle') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.onboarding.fields.subtitle_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.onboarding.fields.description') }}</label>
                <input class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" type="text" name="description" id="description" value="{{ old('description', '') }}">
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.onboarding.fields.description_helper') }}</span>
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