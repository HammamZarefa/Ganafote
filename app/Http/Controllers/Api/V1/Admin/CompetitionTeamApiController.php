<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCompetitionTeamRequest;
use App\Http\Requests\UpdateCompetitionTeamRequest;
use App\Http\Resources\Admin\CompetitionTeamResource;
use App\Models\CompetitionTeam;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CompetitionTeamApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('competition_team_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CompetitionTeamResource(CompetitionTeam::with(['competition', 'team', 'category', 'top_scorer'])->get());
    }

    public function store(StoreCompetitionTeamRequest $request)
    {
        $competitionTeam = CompetitionTeam::create($request->all());

        return (new CompetitionTeamResource($competitionTeam))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(CompetitionTeam $competitionTeam)
    {
        abort_if(Gate::denies('competition_team_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CompetitionTeamResource($competitionTeam->load(['competition', 'team', 'category', 'top_scorer']));
    }

    public function update(UpdateCompetitionTeamRequest $request, CompetitionTeam $competitionTeam)
    {
        $competitionTeam->update($request->all());

        return (new CompetitionTeamResource($competitionTeam))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(CompetitionTeam $competitionTeam)
    {
        abort_if(Gate::denies('competition_team_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $competitionTeam->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
