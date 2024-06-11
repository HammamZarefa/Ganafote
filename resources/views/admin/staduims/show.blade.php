@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.staduim.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.staduims.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.staduim.fields.id') }}
                        </th>
                        <td>
                            {{ $staduim->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.staduim.fields.name') }}
                        </th>
                        <td>
                            {{ $staduim->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.staduim.fields.address') }}
                        </th>
                        <td>
                            {{ $staduim->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.staduim.fields.city') }}
                        </th>
                        <td>
                            {{ $staduim->city }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.staduims.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#stadium_matches" role="tab" data-toggle="tab">
                {{ trans('cruds.match.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="stadium_matches">
            @includeIf('admin.staduims.relationships.stadiumMatches', ['matches' => $staduim->stadiumMatches])
        </div>
    </div>
</div>

@endsection