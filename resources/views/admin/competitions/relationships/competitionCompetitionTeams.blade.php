@can('competition_team_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.competition-teams.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.competitionTeam.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.competitionTeam.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-competitionCompetitionTeams">
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
                </thead>
                <tbody>
                    @foreach($competitionTeams as $key => $competitionTeam)
                        <tr data-entry-id="{{ $competitionTeam->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $competitionTeam->id ?? '' }}
                            </td>
                            <td>
                                {{ $competitionTeam->competition->name ?? '' }}
                            </td>
                            <td>
                                {{ $competitionTeam->team->name ?? '' }}
                            </td>
                            <td>
                                {{ $competitionTeam->category->name ?? '' }}
                            </td>
                            <td>
                                {{ $competitionTeam->group ?? '' }}
                            </td>
                            <td>
                                {{ $competitionTeam->play ?? '' }}
                            </td>
                            <td>
                                {{ $competitionTeam->points ?? '' }}
                            </td>
                            <td>
                                {{ $competitionTeam->goals ?? '' }}
                            </td>
                            <td>
                                {{ $competitionTeam->goal_gainst ?? '' }}
                            </td>
                            <td>
                                {{ $competitionTeam->win ?? '' }}
                            </td>
                            <td>
                                {{ $competitionTeam->lose ?? '' }}
                            </td>
                            <td>
                                {{ $competitionTeam->draw ?? '' }}
                            </td>
                            <td>
                                {{ $competitionTeam->yellow_cards ?? '' }}
                            </td>
                            <td>
                                {{ $competitionTeam->red_cards ?? '' }}
                            </td>
                            <td>
                                {{ $competitionTeam->top_scorer->full_name ?? '' }}
                            </td>
                            <td>
                                {{ $competitionTeam->top_scorer->number ?? '' }}
                            </td>
                            <td>
                                {{ $competitionTeam->top_scorer_goals ?? '' }}
                            </td>
                            <td>
                                @can('competition_team_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.competition-teams.show', $competitionTeam->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('competition_team_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.competition-teams.edit', $competitionTeam->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('competition_team_delete')
                                    <form action="{{ route('admin.competition-teams.destroy', $competitionTeam->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('competition_team_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.competition-teams.massDestroy') }}",
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
  let table = $('.datatable-competitionCompetitionTeams:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection