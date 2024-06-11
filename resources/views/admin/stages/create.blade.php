@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.stage.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.stages.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.stage.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.stage.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('accept_draw') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="accept_draw" value="0">
                    <input class="form-check-input" type="checkbox" name="accept_draw" id="accept_draw" value="1" {{ old('accept_draw', 0) == 1 || old('accept_draw') === null ? 'checked' : '' }}>
                    <label class="form-check-label" for="accept_draw">{{ trans('cruds.stage.fields.accept_draw') }}</label>
                </div>
                @if($errors->has('accept_draw'))
                    <div class="invalid-feedback">
                        {{ $errors->first('accept_draw') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.stage.fields.accept_draw_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.stage.fields.description') }}</label>
                <input class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" type="text" name="description" id="description" value="{{ old('description', '') }}">
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.stage.fields.description_helper') }}</span>
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