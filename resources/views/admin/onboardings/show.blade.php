@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.onboarding.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.onboardings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.onboarding.fields.id') }}
                        </th>
                        <td>
                            {{ $onboarding->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.onboarding.fields.name') }}
                        </th>
                        <td>
                            {{ $onboarding->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.onboarding.fields.subtitle') }}
                        </th>
                        <td>
                            {{ $onboarding->subtitle }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.onboarding.fields.description') }}
                        </th>
                        <td>
                            {{ $onboarding->description }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.onboardings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection