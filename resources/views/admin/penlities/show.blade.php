@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.penlity.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.penlities.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.penlity.fields.id') }}
                        </th>
                        <td>
                            {{ $penlity->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.penlity.fields.match') }}
                        </th>
                        <td>
                            {{ $penlity->match->status ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.penlity.fields.team') }}
                        </th>
                        <td>
                            {{ $penlity->team->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.penlity.fields.player') }}
                        </th>
                        <td>
                            {{ $penlity->player->full_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.penlity.fields.penlity_order') }}
                        </th>
                        <td>
                            {{ $penlity->penlity_order }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.penlity.fields.result') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $penlity->result ? 'checked' : '' }}>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.penlities.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection