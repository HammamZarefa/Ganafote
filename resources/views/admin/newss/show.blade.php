@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.news.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.newss.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.news.fields.id') }}
                        </th>
                        <td>
                            {{ $news->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.news.fields.name') }}
                        </th>
                        <td>
                            {{ $news->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.news.fields.content') }}
                        </th>
                        <td>
                            {!! $news->content !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.news.fields.button_title') }}
                        </th>
                        <td>
                            {{ $news->button_title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.news.fields.button_link') }}
                        </th>
                        <td>
                            {{ $news->button_link }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.news.fields.image') }}
                        </th>
                        <td>
                            @if($news->image)
                                <a href="{{ $news->image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $news->image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.newss.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection