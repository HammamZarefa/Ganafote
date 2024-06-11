@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.matchEvent.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.match-events.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.matchEvent.fields.id') }}
                        </th>
                        <td>
                            {{ $matchEvent->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.matchEvent.fields.match') }}
                        </th>
                        <td>
                            {{ $matchEvent->match->status ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.matchEvent.fields.event_type') }}
                        </th>
                        <td>
                            {{ $matchEvent->event_type }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.matchEvent.fields.team') }}
                        </th>
                        <td>
                            {{ $matchEvent->team->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.matchEvent.fields.player') }}
                        </th>
                        <td>
                            {{ $matchEvent->player->full_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.matchEvent.fields.minute') }}
                        </th>
                        <td>
                            {{ $matchEvent->minute }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.matchEvent.fields.value') }}
                        </th>
                        <td>
                            {{ $matchEvent->value }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.matchEvent.fields.status') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $matchEvent->status ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.matchEvent.fields.notes') }}
                        </th>
                        <td>
                            {{ $matchEvent->notes }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.match-events.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection