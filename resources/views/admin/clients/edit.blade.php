@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.client.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.clients.update", [$client->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="first_name">{{ trans('cruds.client.fields.first_name') }}</label>
                <input class="form-control {{ $errors->has('first_name') ? 'is-invalid' : '' }}" type="text" name="first_name" id="first_name" value="{{ old('first_name', $client->first_name) }}" required>
                @if($errors->has('first_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('first_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.first_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="last_name">{{ trans('cruds.client.fields.last_name') }}</label>
                <input class="form-control {{ $errors->has('last_name') ? 'is-invalid' : '' }}" type="text" name="last_name" id="last_name" value="{{ old('last_name', $client->last_name) }}" required>
                @if($errors->has('last_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('last_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.last_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="birth_date">{{ trans('cruds.client.fields.birth_date') }}</label>
                <input class="form-control date {{ $errors->has('birth_date') ? 'is-invalid' : '' }}" type="text" name="birth_date" id="birth_date" value="{{ old('birth_date', $client->birth_date) }}">
                @if($errors->has('birth_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('birth_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.birth_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="email">{{ trans('cruds.client.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email', $client->email) }}" required>
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="phone">{{ trans('cruds.client.fields.phone') }}</label>
                <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone" id="phone" value="{{ old('phone', $client->phone) }}">
                @if($errors->has('phone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('phone') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="password">{{ trans('cruds.client.fields.password') }}</label>
                <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password" name="password" id="password">
                @if($errors->has('password'))
                    <div class="invalid-feedback">
                        {{ $errors->first('password') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.password_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.client.fields.is_collaborator') }}</label>
                @foreach(App\Models\Client::IS_COLLABORATOR_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('is_collaborator') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="is_collaborator_{{ $key }}" name="is_collaborator" value="{{ $key }}" {{ old('is_collaborator', $client->is_collaborator) === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_collaborator_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('is_collaborator'))
                    <div class="invalid-feedback">
                        {{ $errors->first('is_collaborator') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.is_collaborator_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="country_id">{{ trans('cruds.client.fields.country') }}</label>
                <select class="form-control select2 {{ $errors->has('country') ? 'is-invalid' : '' }}" name="country_id" id="country_id">
                    @foreach($countries as $id => $entry)
                        <option value="{{ $id }}" {{ (old('country_id') ? old('country_id') : $client->country->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('country'))
                    <div class="invalid-feedback">
                        {{ $errors->first('country') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.country_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="state_province">{{ trans('cruds.client.fields.state_province') }}</label>
                <input class="form-control {{ $errors->has('state_province') ? 'is-invalid' : '' }}" type="text" name="state_province" id="state_province" value="{{ old('state_province', $client->state_province) }}">
                @if($errors->has('state_province'))
                    <div class="invalid-feedback">
                        {{ $errors->first('state_province') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.state_province_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="township">{{ trans('cruds.client.fields.township') }}</label>
                <input class="form-control {{ $errors->has('township') ? 'is-invalid' : '' }}" type="text" name="township" id="township" value="{{ old('township', $client->township) }}">
                @if($errors->has('township'))
                    <div class="invalid-feedback">
                        {{ $errors->first('township') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.township_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="zipcode">{{ trans('cruds.client.fields.zipcode') }}</label>
                <input class="form-control {{ $errors->has('zipcode') ? 'is-invalid' : '' }}" type="text" name="zipcode" id="zipcode" value="{{ old('zipcode', $client->zipcode) }}">
                @if($errors->has('zipcode'))
                    <div class="invalid-feedback">
                        {{ $errors->first('zipcode') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.zipcode_helper') }}</span>
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