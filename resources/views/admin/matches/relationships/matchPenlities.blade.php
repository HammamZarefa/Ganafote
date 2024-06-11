@can('penlity_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.penlities.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.penlity.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.penlity.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-matchPenlities">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.penlity.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.penlity.fields.match') }}
                        </th>
                        <th>
                            {{ trans('cruds.penlity.fields.team') }}
                        </th>
                        <th>
                            {{ trans('cruds.penlity.fields.player') }}
                        </th>
                        <th>
                            {{ trans('cruds.penlity.fields.penlity_order') }}
                        </th>
                        <th>
                            {{ trans('cruds.penlity.fields.result') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($penlities as $key => $penlity)
                        <tr data-entry-id="{{ $penlity->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $penlity->id ?? '' }}
                            </td>
                            <td>
                                {{ $penlity->match->status ?? '' }}
                            </td>
                            <td>
                                {{ $penlity->team->name ?? '' }}
                            </td>
                            <td>
                                {{ $penlity->player->full_name ?? '' }}
                            </td>
                            <td>
                                {{ $penlity->penlity_order ?? '' }}
                            </td>
                            <td>
                                <span style="display:none">{{ $penlity->result ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $penlity->result ? 'checked' : '' }}>
                            </td>
                            <td>
                                @can('penlity_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.penlities.show', $penlity->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('penlity_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.penlities.edit', $penlity->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('penlity_delete')
                                    <form action="{{ route('admin.penlities.destroy', $penlity->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('penlity_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.penlities.massDestroy') }}",
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
  let table = $('.datatable-matchPenlities:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection