@extends('layouts.admin')
@section('content')
@can('competition_team_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.competition-teams.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.competitionTeam.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'CompetitionTeam', 'route' => 'admin.competition-teams.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.competitionTeam.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-CompetitionTeam">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.competitionTeam.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.competitionTeam.fields.competition') }}
                    </th>
                    <th>
                        {{ trans('cruds.competitionTeam.fields.team') }}
                    </th>
                    <th>
                        {{ trans('cruds.competitionTeam.fields.category') }}
                    </th>
                    <th>
                        {{ trans('cruds.competitionTeam.fields.group') }}
                    </th>
                    <th>
                        {{ trans('cruds.competitionTeam.fields.play') }}
                    </th>
                    <th>
                        {{ trans('cruds.competitionTeam.fields.points') }}
                    </th>
                    <th>
                        {{ trans('cruds.competitionTeam.fields.goals') }}
                    </th>
                    <th>
                        {{ trans('cruds.competitionTeam.fields.goal_gainst') }}
                    </th>
                    <th>
                        {{ trans('cruds.competitionTeam.fields.win') }}
                    </th>
                    <th>
                        {{ trans('cruds.competitionTeam.fields.lose') }}
                    </th>
                    <th>
                        {{ trans('cruds.competitionTeam.fields.draw') }}
                    </th>
                    <th>
                        {{ trans('cruds.competitionTeam.fields.yellow_cards') }}
                    </th>
                    <th>
                        {{ trans('cruds.competitionTeam.fields.red_cards') }}
                    </th>
                    <th>
                        {{ trans('cruds.competitionTeam.fields.top_scorer') }}
                    </th>
                    <th>
                        {{ trans('cruds.player.fields.number') }}
                    </th>
                    <th>
                        {{ trans('cruds.competitionTeam.fields.top_scorer_goals') }}
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
                            @foreach($competitions as $key => $item)
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
                        <select class="search">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach($players as $key => $item)
                                <option value="{{ $item->full_name }}">{{ $item->full_name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
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
@can('competition_team_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.competition-teams.massDestroy') }}",
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
    ajax: "{{ route('admin.competition-teams.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'competition_name', name: 'competition.name' },
{ data: 'team_name', name: 'team.name' },
{ data: 'category_name', name: 'category.name' },
{ data: 'group', name: 'group' },
{ data: 'play', name: 'play' },
{ data: 'points', name: 'points' },
{ data: 'goals', name: 'goals' },
{ data: 'goal_gainst', name: 'goal_gainst' },
{ data: 'win', name: 'win' },
{ data: 'lose', name: 'lose' },
{ data: 'draw', name: 'draw' },
{ data: 'yellow_cards', name: 'yellow_cards' },
{ data: 'red_cards', name: 'red_cards' },
{ data: 'top_scorer_full_name', name: 'top_scorer.full_name' },
{ data: 'top_scorer.number', name: 'top_scorer.number' },
{ data: 'top_scorer_goals', name: 'top_scorer_goals' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-CompetitionTeam').DataTable(dtOverrideGlobals);
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