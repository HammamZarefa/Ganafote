@can('player_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.players.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.player.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.player.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-teamPlayers">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.player.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.player.fields.full_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.player.fields.number') }}
                        </th>
                        <th>
                            {{ trans('cruds.player.fields.age') }}
                        </th>
                        <th>
                            {{ trans('cruds.player.fields.category') }}
                        </th>
                        <th>
                            {{ trans('cruds.player.fields.team') }}
                        </th>
                        <th>
                            {{ trans('cruds.player.fields.position') }}
                        </th>
                        <th>
                            {{ trans('cruds.player.fields.image') }}
                        </th>
                        <th>
                            {{ trans('cruds.player.fields.is_starter') }}
                        </th>
                        <th>
                            {{ trans('cruds.player.fields.height') }}
                        </th>
                        <th>
                            {{ trans('cruds.player.fields.weight') }}
                        </th>
                        <th>
                            {{ trans('cruds.player.fields.nationality') }}
                        </th>
                        <th>
                            {{ trans('cruds.country.fields.nationality') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($players as $key => $player)
                        <tr data-entry-id="{{ $player->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $player->id ?? '' }}
                            </td>
                            <td>
                                {{ $player->full_name ?? '' }}
                            </td>
                            <td>
                                {{ $player->number ?? '' }}
                            </td>
                            <td>
                                {{ $player->age ?? '' }}
                            </td>
                            <td>
                                {{ $player->category->name ?? '' }}
                            </td>
                            <td>
                                {{ $player->team->name ?? '' }}
                            </td>
                            <td>
                                {{ $player->position->name ?? '' }}
                            </td>
                            <td>
                                @if($player->image)
                                    <a href="{{ $player->image->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $player->image->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                <span style="display:none">{{ $player->is_starter ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $player->is_starter ? 'checked' : '' }}>
                            </td>
                            <td>
                                {{ $player->height ?? '' }}
                            </td>
                            <td>
                                {{ $player->weight ?? '' }}
                            </td>
                            <td>
                                {{ $player->nationality->nationality ?? '' }}
                            </td>
                            <td>
                                {{ $player->nationality->nationality ?? '' }}
                            </td>
                            <td>
                                @can('player_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.players.show', $player->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('player_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.players.edit', $player->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('player_delete')
                                    <form action="{{ route('admin.players.destroy', $player->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('player_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.players.massDestroy') }}",
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
  let table = $('.datatable-teamPlayers:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection