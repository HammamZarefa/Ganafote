@can('category_competition_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.category-competitions.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.categoryCompetition.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.categoryCompetition.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-competitionCategoryCompetitions">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.categoryCompetition.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.categoryCompetition.fields.category') }}
                        </th>
                        <th>
                            {{ trans('cruds.categoryCompetition.fields.competition') }}
                        </th>
                        <th>
                            {{ trans('cruds.categoryCompetition.fields.number_of_players') }}
                        </th>
                        <th>
                            {{ trans('cruds.categoryCompetition.fields.half_duration') }}
                        </th>
                        <th>
                            {{ trans('cruds.categoryCompetition.fields.number_of_teams_in_group') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categoryCompetitions as $key => $categoryCompetition)
                        <tr data-entry-id="{{ $categoryCompetition->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $categoryCompetition->id ?? '' }}
                            </td>
                            <td>
                                {{ $categoryCompetition->category->name ?? '' }}
                            </td>
                            <td>
                                {{ $categoryCompetition->competition->name ?? '' }}
                            </td>
                            <td>
                                {{ $categoryCompetition->number_of_players ?? '' }}
                            </td>
                            <td>
                                {{ $categoryCompetition->half_duration ?? '' }}
                            </td>
                            <td>
                                {{ $categoryCompetition->number_of_teams_in_group ?? '' }}
                            </td>
                            <td>
                                @can('category_competition_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.category-competitions.show', $categoryCompetition->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('category_competition_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.category-competitions.edit', $categoryCompetition->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('category_competition_delete')
                                    <form action="{{ route('admin.category-competitions.destroy', $categoryCompetition->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('category_competition_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.category-competitions.massDestroy') }}",
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
  let table = $('.datatable-competitionCategoryCompetitions:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection