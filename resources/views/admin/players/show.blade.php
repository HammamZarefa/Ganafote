@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.player.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.players.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.player.fields.id') }}
                        </th>
                        <td>
                            {{ $player->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.player.fields.full_name') }}
                        </th>
                        <td>
                            {{ $player->full_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.player.fields.number') }}
                        </th>
                        <td>
                            {{ $player->number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.player.fields.age') }}
                        </th>
                        <td>
                            {{ $player->age }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.player.fields.category') }}
                        </th>
                        <td>
                            {{ $player->category->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.player.fields.team') }}
                        </th>
                        <td>
                            {{ $player->team->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.player.fields.position') }}
                        </th>
                        <td>
                            {{ $player->position->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.player.fields.image') }}
                        </th>
                        <td>
                            @if($player->image)
                                <a href="{{ $player->image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $player->image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.player.fields.certificate') }}
                        </th>
                        <td>
                            @foreach($player->certificate as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.player.fields.is_starter') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $player->is_starter ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.player.fields.height') }}
                        </th>
                        <td>
                            {{ $player->height }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.player.fields.weight') }}
                        </th>
                        <td>
                            {{ $player->weight }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.player.fields.nationality') }}
                        </th>
                        <td>
                            {{ $player->nationality->nationality ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.players.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection