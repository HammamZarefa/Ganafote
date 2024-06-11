@can('match_event_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.match-events.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.matchEvent.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.matchEvent.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-matchMatchEvents">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.matchEvent.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.matchEvent.fields.match') }}
                        </th>
                        <th>
                            {{ trans('cruds.matchEvent.fields.event_type') }}
                        </th>
                        <th>
                            {{ trans('cruds.matchEvent.fields.team') }}
                        </th>
                        <th>
                            {{ trans('cruds.matchEvent.fields.player') }}
                        </th>
                        <th>
                            {{ trans('cruds.matchEvent.fields.minute') }}
                        </th>
                        <th>
                            {{ trans('cruds.matchEvent.fields.status') }}
                        </th>
                        <th>
                            {{ trans('cruds.matchEvent.fields.notes') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($matchEvents as $key => $matchEvent)
                        <tr data-entry-id="{{ $matchEvent->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $matchEvent->id ?? '' }}
                            </td>
                            <td>
                                {{ $matchEvent->match->status ?? '' }}
                            </td>
                            <td>
                                {{ $matchEvent->event_type ?? '' }}
                            </td>
                            <td>
                                {{ $matchEvent->team->name ?? '' }}
                            </td>
                            <td>
                                {{ $matchEvent->player->full_name ?? '' }}
                            </td>
                            <td>
                                {{ $matchEvent->minute ?? '' }}
                            </td>
                            <td>
                                <span style="display:none">{{ $matchEvent->status ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $matchEvent->status ? 'checked' : '' }}>
                            </td>
                            <td>
                                {{ $matchEvent->notes ?? '' }}
                            </td>
                            <td>
                                @can('match_event_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.match-events.show', $matchEvent->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('match_event_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.match-events.edit', $matchEvent->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('match_event_delete')
                                    <form action="{{ route('admin.match-events.destroy', $matchEvent->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('match_event_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.match-events.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-matchMatchEvents:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection