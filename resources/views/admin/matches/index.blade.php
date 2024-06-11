@extends('layouts.admin')
@section('content')
@can('match_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.matches.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.match.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'Match', 'route' => 'admin.matches.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.match.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Match">
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
                <tr>
                    <td>
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <select class="search">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach($teams as $key => $item)
                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select class="search">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach($teams as $key => $item)
                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select class="search">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach($categories as $key => $item)
                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select class="search">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach($competitions as $key => $item)
                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select class="search">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach($stages as $key => $item)
                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                    </td>
                    <td>
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <select class="search" strict="true">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach(App\Models\Match::HAS_PENLTY_SELECT as $key => $item)
                                <option value="{{ $key }}">{{ $item }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <select class="search">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach($staduims as $key => $item)
                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select class="search">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach($clients as $key => $item)
                                <option value="{{ $item->first_name }}">{{ $item->first_name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                    </td>
                </tr>
            </thead>
        </table>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('match_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.matches.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
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

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.matches.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'team_home_name', name: 'team_home.name' },
{ data: 'team_away_name', name: 'team_away.name' },
{ data: 'category_name', name: 'category.name' },
{ data: 'competetion_name', name: 'competetion.name' },
{ data: 'stage_name', name: 'stage.name' },
{ data: 'status', name: 'status' },
{ data: 'start_date', name: 'start_date' },
{ data: 'start_time', name: 'start_time' },
{ data: 'home_score', name: 'home_score' },
{ data: 'away_score', name: 'away_score' },
{ data: 'home_half_score', name: 'home_half_score' },
{ data: 'away_half_score', name: 'away_half_score' },
{ data: 'home_yellow_card', name: 'home_yellow_card' },
{ data: 'away_yellow_card', name: 'away_yellow_card' },
{ data: 'home_red_card', name: 'home_red_card' },
{ data: 'away_red_card', name: 'away_red_card' },
{ data: 'home_summery', name: 'home_summery' },
{ data: 'away_summery', name: 'away_summery' },
{ data: 'has_penlty', name: 'has_penlty' },
{ data: 'end_time', name: 'end_time' },
{ data: 'notes', name: 'notes' },
{ data: 'stadium_name', name: 'stadium.name' },
{ data: 'collaborator_first_name', name: 'collaborator.first_name' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-Match').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
let visibleColumnsIndexes = null;
$('.datatable thead').on('input', '.search', function () {
      let strict = $(this).attr('strict') || false
      let value = strict && this.value ? "^" + this.value + "$" : this.value

      let index = $(this).parent().index()
      if (visibleColumnsIndexes !== null) {
        index = visibleColumnsIndexes[index]
      }

      table
        .column(index)
        .search(value, strict)
        .draw()
  });
table.on('column-visibility.dt', function(e, settings, column, state) {
      visibleColumnsIndexes = []
      table.columns(":visible").every(function(colIdx) {
          visibleColumnsIndexes.push(colIdx);
      });
  })
});

</script>
@endsection