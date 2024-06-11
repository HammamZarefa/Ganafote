@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.lineup.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.lineups.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.lineup.fields.id') }}
                        </th>
                        <td>
                            {{ $lineup->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.lineup.fields.match') }}
                        </th>
                        <td>
                            {{ $lineup->match->status ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.lineup.fields.team') }}
                        </th>
                        <td>
                            {{ $lineup->team->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.lineup.fields.player') }}
                        </th>
                        <td>
                            {{ $lineup->player->full_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.lineup.fields.position') }}
                        </th>
                        <td>
                            {{ $lineup->position->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.lineup.fields.is_starter') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $lineup->is_starter ? 'checked' : '' }}>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.lineups.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection