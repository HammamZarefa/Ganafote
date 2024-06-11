<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;
use App\Models\MatchEvent;
use App\Models\Match;
use App\Models\Team;
use App\Models\Player;
use App\Http\Requests\StoreMatchEventRequest;
use App\Http\Requests\UpdateMatchEventRequest;
use App\Http\Requests\MassDestroyMatchEventRequest;

class MatchEventController extends Controller  {





function index(Request $request)
{
    abort_if(Gate::denies('match_event_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

    if ($request->ajax()) {
        $query = MatchEvent::with(['match', 'team', 'player'])->select(sprintf('%s.*', (new MatchEvent)->table));
        $table = Datatables::of($query);

        $table->addColumn('placeholder', '&nbsp;');
        $table->addColumn('actions', '&nbsp;');

        $table->editColumn('actions', function ($row) {
            $viewGate = 'match_event_show';
            $editGate = 'match_event_edit';
            $deleteGate = 'match_event_delete';
            $crudRoutePart = 'match-events';

            return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
        });

        $table->editColumn('id', function ($row) {
    return $row->id ? $row->id : "";
});
$table->addColumn('match_status', function ($row) {
    return $row->match ? $row->match->status : '';
});

$table->editColumn('event_type', function ($row) {
    return $row->event_type ? $row->event_type : "";
});
$table->addColumn('team_name', function ($row) {
    return $row->team ? $row->team->name : '';
});

$table->addColumn('player_full_name', function ($row) {
    return $row->player ? $row->player->full_name : '';
});

$table->editColumn('minute', function ($row) {
    return $row->minute ? $row->minute : "";
});
$table->editColumn('status', function ($row) {
    return '<input type="checkbox" disabled ' . ($row->status ? 'checked' : null) . '>';
});
$table->editColumn('notes', function ($row) {
    return $row->notes ? $row->notes : "";
});

        $table->rawColumns(['actions', 'placeholder', 'match', 'team', 'player', 'status']);

        return $table->make(true);
    }

    $matches = Match::get();
$teams = Team::get();
$players = Player::get();
    return view('admin.matchEvents.index', compact('matches','teams','players'));
}

function create()
{
    abort_if(Gate::denies('match_event_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');



$matches = Match::pluck('status', 'id')->prepend(trans('global.pleaseSelect'), '');


$teams = Team::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');


$players = Player::pluck('full_name', 'id')->prepend(trans('global.pleaseSelect'), '');



    return view('admin.matchEvents.create', compact('matches', 'players', 'teams'));
}
function store(StoreMatchEventRequest $request)
{
    



$matchEvent = MatchEvent::create($request->all());


return redirect()->route('admin.match-events.index');
    
}
function edit(MatchEvent $matchEvent)
{
    abort_if(Gate::denies('match_event_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');



$matches = Match::pluck('status', 'id')->prepend(trans('global.pleaseSelect'), '');


$teams = Team::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');


$players = Player::pluck('full_name', 'id')->prepend(trans('global.pleaseSelect'), '');


$matchEvent->load('match', 'team', 'player');

    return view('admin.matchEvents.edit', compact('matchEvent', 'matches', 'players', 'teams'));
}
function update(UpdateMatchEventRequest $request, MatchEvent $matchEvent)
{
    



$matchEvent->update($request->all());


return redirect()->route('admin.match-events.index');
    
}
function show(MatchEvent $matchEvent)
{
    abort_if(Gate::denies('match_event_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');




$matchEvent->load('match', 'team', 'player');

    return view('admin.matchEvents.show', compact('matchEvent'));
}
function destroy(MatchEvent $matchEvent)
{
    abort_if(Gate::denies('match_event_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');




$matchEvent->delete();
return back();
    
}
function massDestroy(MassDestroyMatchEventRequest $request)
{
    



$matchEvents = MatchEvent::find(request('ids'));

foreach ($matchEvents as $matchEvent) {
$matchEvent->delete();
}

return response(null, Response::HTTP_NO_CONTENT);
    
}

}