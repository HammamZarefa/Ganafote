<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Models\Match;
use App\Models\Team;
use App\Models\Category;
use App\Models\Competition;
use App\Models\Stage;
use App\Models\Staduim;
use App\Models\Client;
use App\Http\Requests\StoreMatchRequest;
use App\Http\Requests\UpdateMatchRequest;
use App\Http\Requests\MassDestroyMatchRequest;

class MatchController extends Controller  {

use CsvImportTrait;



function index(Request $request)
{
    abort_if(Gate::denies('match_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

    if ($request->ajax()) {
        $query = Match::with(['team_home', 'team_away', 'category', 'competetion', 'stage', 'stadium', 'collaborator'])->select(sprintf('%s.*', (new Match)->table));
        $table = Datatables::of($query);

        $table->addColumn('placeholder', '&nbsp;');
        $table->addColumn('actions', '&nbsp;');

        $table->editColumn('actions', function ($row) {
            $viewGate = 'match_show';
            $editGate = 'match_edit';
            $deleteGate = 'match_delete';
            $crudRoutePart = 'matches';

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
$table->addColumn('team_home_name', function ($row) {
    return $row->team_home ? $row->team_home->name : '';
});

$table->addColumn('team_away_name', function ($row) {
    return $row->team_away ? $row->team_away->name : '';
});

$table->addColumn('category_name', function ($row) {
    return $row->category ? $row->category->name : '';
});

$table->addColumn('competetion_name', function ($row) {
    return $row->competetion ? $row->competetion->name : '';
});

$table->addColumn('stage_name', function ($row) {
    return $row->stage ? $row->stage->name : '';
});

$table->editColumn('status', function ($row) {
    return $row->status ? $row->status : "";
});

$table->editColumn('start_time', function ($row) {
    return $row->start_time ? $row->start_time : "";
});
$table->editColumn('home_score', function ($row) {
    return $row->home_score ? $row->home_score : "";
});
$table->editColumn('away_score', function ($row) {
    return $row->away_score ? $row->away_score : "";
});
$table->editColumn('home_half_score', function ($row) {
    return $row->home_half_score ? $row->home_half_score : "";
});
$table->editColumn('away_half_score', function ($row) {
    return $row->away_half_score ? $row->away_half_score : "";
});
$table->editColumn('home_yellow_card', function ($row) {
    return $row->home_yellow_card ? $row->home_yellow_card : "";
});
$table->editColumn('away_yellow_card', function ($row) {
    return $row->away_yellow_card ? $row->away_yellow_card : "";
});
$table->editColumn('home_red_card', function ($row) {
    return $row->home_red_card ? $row->home_red_card : "";
});
$table->editColumn('away_red_card', function ($row) {
    return $row->away_red_card ? $row->away_red_card : "";
});
$table->editColumn('home_summery', function ($row) {
    return $row->home_summery ? $row->home_summery : "";
});
$table->editColumn('away_summery', function ($row) {
    return $row->away_summery ? $row->away_summery : "";
});
$table->editColumn('has_penlty', function ($row) {
    return $row->has_penlty ? Match::HAS_PENLTY_SELECT[$row->has_penlty] : '';
});
$table->editColumn('end_time', function ($row) {
    return $row->end_time ? $row->end_time : "";
});
$table->editColumn('notes', function ($row) {
    return $row->notes ? $row->notes : "";
});
$table->addColumn('stadium_name', function ($row) {
    return $row->stadium ? $row->stadium->name : '';
});

$table->addColumn('collaborator_first_name', function ($row) {
    return $row->collaborator ? $row->collaborator->first_name : '';
});


        $table->rawColumns(['actions', 'placeholder', 'team_home', 'team_away', 'category', 'competetion', 'stage', 'stadium', 'collaborator']);

        return $table->make(true);
    }

    $teams = Team::get();
$categories = Category::get();
$competitions = Competition::get();
$stages = Stage::get();
$staduims = Staduim::get();
$clients = Client::get();
    return view('admin.matches.index', compact('teams','categories','competitions','stages','staduims','clients'));
}

function create()
{
    abort_if(Gate::denies('match_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');



$team_homes = Team::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');


$team_aways = Team::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');


$categories = Category::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');


$competetions = Competition::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');


$stages = Stage::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');


$stadia = Staduim::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');


$collaborators = Client::pluck('first_name', 'id')->prepend(trans('global.pleaseSelect'), '');



    return view('admin.matches.create', compact('categories', 'collaborators', 'competetions', 'stadia', 'stages', 'team_aways', 'team_homes'));
}
function store(StoreMatchRequest $request)
{
    



$match = Match::create($request->all());


return redirect()->route('admin.matches.index');
    
}
function edit(Match $match)
{
    abort_if(Gate::denies('match_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');



$team_homes = Team::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');


$team_aways = Team::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');


$categories = Category::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');


$competetions = Competition::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');


$stages = Stage::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');


$stadia = Staduim::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');


$collaborators = Client::pluck('first_name', 'id')->prepend(trans('global.pleaseSelect'), '');


$match->load('team_home', 'team_away', 'category', 'competetion', 'stage', 'stadium', 'collaborator');

    return view('admin.matches.edit', compact('categories', 'collaborators', 'competetions', 'match', 'stadia', 'stages', 'team_aways', 'team_homes'));
}
function update(UpdateMatchRequest $request, Match $match)
{
    



$match->update($request->all());


return redirect()->route('admin.matches.index');
    
}
function show(Match $match)
{
    abort_if(Gate::denies('match_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');




$match->load('team_home', 'team_away', 'category', 'competetion', 'stage', 'stadium', 'collaborator', 'matchMatchEvents', 'matchPenlities');

    return view('admin.matches.show', compact('match'));
}
function destroy(Match $match)
{
    abort_if(Gate::denies('match_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');




$match->delete();
return back();
    
}
function massDestroy(MassDestroyMatchRequest $request)
{
    



$matches = Match::find(request('ids'));

foreach ($matches as $match) {
$match->delete();
}

return response(null, Response::HTTP_NO_CONTENT);
    
}

}