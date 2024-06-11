@can('match_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.matches.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.match.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.match.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-stadiumMatches">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.match.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.match.fields.team_home') }}
                        </th>
                        <th>
                            {{ trans('cruds.match.fields.team_away') }}
                        </th>
                        <th>
                            {{ trans('cruds.match.fields.category') }}
                        </th>
                        <th>
                            {{ trans('cruds.match.fields.competetion') }}
                        </th>
                        <th>
                            {{ trans('cruds.match.fields.stage') }}
                        </th>
                        <th>
                            {{ trans('cruds.match.fields.status') }}
                        </th>
                        <th>
                            {{ trans('cruds.match.fields.start_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.match.fields.start_time') }}
                        </th>
                        <th>
                            {{ trans('cruds.match.fields.home_score') }}
                        </th>
                        <th>
                            {{ trans('cruds.match.fields.away_score') }}
                        </th>
                        <th>
                            {{ trans('cruds.match.fields.home_half_score') }}
                        </th>
                        <th>
                            {{ trans('cruds.match.fields.away_half_score') }}
                        </th>
                        <th>
                            {{ trans('cruds.match.fields.home_yellow_card') }}
                        </th>
                        <th>
                            {{ trans('cruds.match.fields.away_yellow_card') }}
                        </th>
                        <th>
                            {{ trans('cruds.match.fields.home_red_card') }}
                        </th>
                        <th>
                            {{ trans('cruds.match.fields.away_red_card') }}
                        </th>
                        <th>
                            {{ trans('cruds.match.fields.home_summery') }}
                        </th>
                        <th>
                            {{ trans('cruds.match.fields.away_summery') }}
                        </th>
                        <th>
                            {{ trans('cruds.match.fields.has_penlty') }}
                        </th>
                        <th>
                            {{ trans('cruds.match.fields.end_time') }}
                        </th>
                        <th>
                            {{ trans('cruds.match.fields.notes') }}
                        </th>
                        <th>
                            {{ trans('cruds.match.fields.stadium') }}
                        </th>
                        <th>
                            {{ trans('cruds.match.fields.collaborator') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($matches as $key => $match)
                        <tr data-entry-id="{{ $match->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $match->id ?? '' }}
                            </td>
                            <td>
                                {{ $match->team_home->name ?? '' }}
                            </td>
                            <td>
                                {{ $match->team_away->name ?? '' }}
                            </td>
                            <td>
                                {{ $match->category->name ?? '' }}
                            </td>
                            <td>
                                {{ $match->competetion->name ?? '' }}
                            </td>
                            <td>
                                {{ $match->stage->name ?? '' }}
                            </td>
                            <td>
                                {{ $match->status ?? '' }}
                            </td>
                            <td>
                                {{ $match->start_date ?? '' }}
                            </td>
                            <td>
                                {{ $match->start_time ?? '' }}
                            </td>
                            <td>
                                {{ $match->home_score ?? '' }}
                            </td>
                            <td>
                                {{ $match->away_score ?? '' }}
                            </td>
                            <td>
                                {{ $match->home_half_score ?? '' }}
                            </td>
                            <td>
                                {{ $match->away_half_score ?? '' }}
                            </td>
                            <td>
                                {{ $match->home_yellow_card ?? '' }}
                            </td>
                            <td>
                                {{ $match->away_yellow_card ?? '' }}
                            </td>
                            <td>
                                {{ $match->home_red_card ?? '' }}
                            </td>
                            <td>
                                {{ $match->away_red_card ?? '' }}
                            </td>
                            <td>
                                {{ $match->home_summery ?? '' }}
                            </td>
                            <td>
                                {{ $match->away_summery ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Match::HAS_PENLTY_SELECT[$match->has_penlty] ?? '' }}
                            </td>
                            <td>
                                {{ $match->end_time ?? '' }}
                            </td>
                            <td>
                                {{ $match->notes ?? '' }}
                            </td>
                            <td>
                                {{ $match->stadium->name ?? '' }}
                            </td>
                            <td>
                                {{ $match->collaborator->first_name ?? '' }}
                            </td>
                            <td>
                                @can('match_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.matches.show', $match->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('match_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.matches.edit', $match->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('match_delete')
                                    <form action="{{ route('admin.matches.destroy', $match->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('match_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.matches.massDestroy') }}",
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
  let table = $('.datatable-stadiumMatches:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection