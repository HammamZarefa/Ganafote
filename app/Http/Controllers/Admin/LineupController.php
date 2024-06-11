<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Models\Lineup;
use App\Models\Match;
use App\Models\Team;
use App\Models\Player;
use App\Models\Position;
use App\Http\Requests\StoreLineupRequest;
use App\Http\Requests\UpdateLineupRequest;
use App\Http\Requests\MassDestroyLineupRequest;

class LineupController extends Controller  {

use CsvImportTrait;



function index(Request $request)
{
    abort_if(Gate::denies('lineup_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

    if ($request->ajax()) {
        $query = Lineup::with(['match', 'team', 'player', 'position'])->select(sprintf('%s.*', (new Lineup)->table));
        $table = Datatables::of($query);

        $table->addColumn('placeholder', '&nbsp;');
        $table->addColumn('actions', '&nbsp;');

        $table->editColumn('actions', function ($row) {
            $viewGate = 'lineup_show';
            $editGate = 'lineup_edit';
            $deleteGate = 'lineup_delete';
            $crudRoutePart = 'lineups';

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

$table->addColumn('team_name', function ($row) {
    return $row->team ? $row->team->name : '';
});

$table->addColumn('player_full_name', function ($row) {
    return $row->player ? $row->player->full_name : '';
});

$table->addColumn('position_name', function ($row) {
    return $row->position ? $row->position->name : '';
});

$table->editColumn('is_starter', function ($row) {
    return '<input type="checkbox" disabled ' . ($row->is_starter ? 'checked' : null) . '>';
});

        $table->rawColumns(['actions', 'placeholder', 'match', 'team', 'player', 'position', 'is_starter']);

        return $table->make(true);
    }

    $matches = Match::get();
$teams = Team::get();
$players = Player::get();
$positions = Position::get();
    return view('admin.lineups.index', compact('matches','teams','players','positions'));
}

function create()
{
    abort_if(Gate::denies('lineup_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');



$matches = Match::pluck('status', 'id')->prepend(trans('global.pleaseSelect'), '');


$teams = Team::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');


$players = Player::pluck('full_name', 'id')->prepend(trans('global.pleaseSelect'), '');


$positions = Position::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');



    return view('admin.lineups.create', compact('matches', 'players', 'positions', 'teams'));
}
function store(StoreLineupRequest $request)
{
    



$lineup = Lineup::create($request->all());


return redirect()->route('admin.lineups.index');
    
}
function edit(Lineup $lineup)
{
    abort_if(Gate::denies('lineup_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');



$matches = Match::pluck('status', 'id')->prepend(trans('global.pleaseSelect'), '');


$teams = Team::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');


$players = Player::pluck('full_name', 'id')->prepend(trans('global.pleaseSelect'), '');


$positions = Position::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');


$lineup->load('match', 'team', 'player', 'position');

    return view('admin.lineups.edit', compact('lineup', 'matches', 'players', 'positions', 'teams'));
}
function update(UpdateLineupRequest $request, Lineup $lineup)
{
    



$lineup->update($request->all());


return redirect()->route('admin.lineups.index');
    
}
function show(Lineup $lineup)
{
    abort_if(Gate::denies('lineup_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');




$lineup->load('match', 'team', 'player', 'position');

    return view('admin.lineups.show', compact('lineup'));
}
function destroy(Lineup $lineup)
{
    abort_if(Gate::denies('lineup_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');




$lineup->delete();
return back();
    
}
function massDestroy(MassDestroyLineupRequest $request)
{
    



$lineups = Lineup::find(request('ids'));

foreach ($lineups as $lineup) {
$lineup->delete();
}

return response(null, Response::HTTP_NO_CONTENT);
    
}

}