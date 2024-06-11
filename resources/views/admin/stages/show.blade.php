@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.stage.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.stages.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.stage.fields.id') }}
                        </th>
                        <td>
                            {{ $stage->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.stage.fields.name') }}
                        </th>
                        <td>
                            {{ $stage->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.stage.fields.accept_draw') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $stage->accept_draw ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.stage.fields.description') }}
                        </th>
                        <td>
                            {{ $stage->description }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.stages.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection