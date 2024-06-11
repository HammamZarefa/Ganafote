<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyCompetitionTeamRequest;
use App\Http\Requests\StoreCompetitionTeamRequest;
use App\Http\Requests\UpdateCompetitionTeamRequest;
use App\Models\Category;
use App\Models\Competition;
use App\Models\CompetitionTeam;
use App\Models\Player;
use App\Models\Team;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class CompetitionTeamController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('competition_team_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = CompetitionTeam::with(['competition', 'team', 'category', 'top_scorer'])->select(sprintf('%s.*', (new CompetitionTeam)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'competition_team_show';
                $editGate      = 'competition_team_edit';
                $deleteGate    = 'competition_team_delete';
                $crudRoutePart = 'competition-teams';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->addColumn('competition_name', function ($row) {
                return $row->competition ? $row->competition->name : '';
            });

            $table->addColumn('team_name', function ($row) {
                return $row->team ? $row->team->name : '';
            });

            $table->addColumn('category_name', function ($row) {
                return $row->category ? $row->category->name : '';
            });

            $table->editColumn('group', function ($row) {
                return $row->group ? $row->group : '';
            });
            $table->editColumn('play', function ($row) {
                return $row->play ? $row->play : '';
            });
            $table->editColumn('points', function ($row) {
                return $row->points ? $row->points : '';
            });
            $table->editColumn('goals', function ($row) {
                return $row->goals ? $row->goals : '';
            });
            $table->editColumn('goal_gainst', function ($row) {
                return $row->goal_gainst ? $row->goal_gainst : '';
            });
            $table->editColumn('win', function ($row) {
                return $row->win ? $row->win : '';
            });
            $table->editColumn('lose', function ($row) {
                return $row->lose ? $row->lose : '';
            });
            $table->editColumn('draw', function ($row) {
                return $row->draw ? $row->draw : '';
            });
            $table->editColumn('yellow_cards', function ($row) {
                return $row->yellow_cards ? $row->yellow_cards : '';
            });
            $table->editColumn('red_cards', function ($row) {
                return $row->red_cards ? $row->red_cards : '';
            });
            $table->addColumn('top_scorer_full_name', function ($row) {
                return $row->top_scorer ? $row->top_scorer->full_name : '';
            });

            $table->editColumn('top_scorer.number', function ($row) {
                return $row->top_scorer ? (is_string($row->top_scorer) ? $row->top_scorer : $row->top_scorer->number) : '';
            });
            $table->editColumn('top_scorer_goals', function ($row) {
                return $row->top_scorer_goals ? $row->top_scorer_goals : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'competition', 'team', 'category', 'top_scorer']);

            return $table->make(true);
        }

        $competitions = Competition::get();
        $teams        = Team::get();
        $categories   = Category::get();
        $players      = Player::get();

        return view('admin.competitionTeams.index', compact('competitions', 'teams', 'categories', 'players'));
    }

    public function create()
    {
        abort_if(Gate::denies('competition_team_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $competitions = Competition::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $teams = Team::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $categories = Category::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.competitionTeams.create', compact('categories', 'competitions', 'teams'));
    }

    public function store(StoreCompetitionTeamRequest $request)
    {
        $competitionTeam = CompetitionTeam::create($request->all());

        return redirect()->route('admin.competition-teams.index');
    }

    public function edit(CompetitionTeam $competitionTeam)
    {
        abort_if(Gate::denies('competition_team_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $competitions = Competition::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $teams = Team::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $categories = Category::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $top_scorers = Player::pluck('full_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $competitionTeam->load('competition', 'team', 'category', 'top_scorer');

        return view('admin.competitionTeams.edit', compact('categories', 'competitionTeam', 'competitions', 'teams', 'top_scorers'));
    }

    public function update(UpdateCompetitionTeamRequest $request, CompetitionTeam $competitionTeam)
    {
        $competitionTeam->update($request->all());

        return redirect()->route('admin.competition-teams.index');
    }

    public function show(CompetitionTeam $competitionTeam)
    {
        abort_if(Gate::denies('competition_team_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $competitionTeam->load('competition', 'team', 'category', 'top_scorer');

        return view('admin.competitionTeams.show', compact('competitionTeam'));
    }

    public function destroy(CompetitionTeam $competitionTeam)
    {
        abort_if(Gate::denies('competition_team_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $competitionTeam->delete();

        return back();
    }

    public function massDestroy(MassDestroyCompetitionTeamRequest $request)
    {
        $competitionTeams = CompetitionTeam::find(request('ids'));

        foreach ($competitionTeams as $competitionTeam) {
            $competitionTeam->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
