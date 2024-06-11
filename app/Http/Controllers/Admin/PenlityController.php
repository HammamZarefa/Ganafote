<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Penlity;
use App\Models\Match;
use App\Models\Team;
use App\Models\Player;
use App\Http\Requests\StorePenlityRequest;
use App\Http\Requests\UpdatePenlityRequest;
use App\Http\Requests\MassDestroyPenlityRequest;

class PenlityController extends Controller  {





function index(Request $request)
{
    abort_if(Gate::denies('penlity_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

    if ($request->ajax()) {
        $query = Penlity::with(['match', 'team', 'player'])->select(sprintf('%s.*', (new Penlity)->table));
        $table = Datatables::of($query);

        $table->addColumn('placeholder', '&nbsp;');
        $table->addColumn('actions', '&nbsp;');

        $table->editColumn('actions', function ($row) {
            $viewGate = 'penlity_show';
            $editGate = 'penlity_edit';
            $deleteGate = 'penlity_delete';
            $crudRoutePart = 'penlities';

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

$table->editColumn('penlity_order', function ($row) {
    return $row->penlity_order ? $row->penlity_order : "";
});
$table->editColumn('result', function ($row) {
    return '<input type="checkbox" disabled ' . ($row->result ? 'checked' : null) . '>';
});

        $table->rawColumns(['actions', 'placeholder', 'match', 'team', 'player', 'result']);

        return $table->make(true);
    }

    $matches = Match::get();
$teams = Team::get();
$players = Player::get();
    return view('admin.penlities.index', compact('matches','teams','players'));
}

function create()
{
    abort_if(Gate::denies('penlity_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');



$matches = Match::pluck('status', 'id')->prepend(trans('global.pleaseSelect'), '');


$teams = Team::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');


$players = Player::pluck('full_name', 'id')->prepend(trans('global.pleaseSelect'), '');



    return view('admin.penlities.create', compact('matches', 'players', 'teams'));
}
function store(StorePenlityRequest $request)
{
    



$penlity = Penlity::create($request->all());


return redirect()->route('admin.penlities.index');
    
}
function edit(Penlity $penlity)
{
    abort_if(Gate::denies('penlity_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');



$matches = Match::pluck('status', 'id')->prepend(trans('global.pleaseSelect'), '');


$teams = Team::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');


$players = Player::pluck('full_name', 'id')->prepend(trans('global.pleaseSelect'), '');


$penlity->load('match', 'team', 'player');

    return view('admin.penlities.edit', compact('matches', 'penlity', 'players', 'teams'));
}
function update(UpdatePenlityRequest $request, Penlity $penlity)
{
    



$penlity->update($request->all());


return redirect()->route('admin.penlities.index');
    
}
function show(Penlity $penlity)
{
    abort_if(Gate::denies('penlity_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');




$penlity->load('match', 'team', 'player');

    return view('admin.penlities.show', compact('penlity'));
}
function destroy(Penlity $penlity)
{
    abort_if(Gate::denies('penlity_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');




$penlity->delete();
return back();
    
}
function massDestroy(MassDestroyPenlityRequest $request)
{
    



$penlities = Penlity::find(request('ids'));

foreach ($penlities as $penlity) {
$penlity->delete();
}

return response(null, Response::HTTP_NO_CONTENT);
    
}

}