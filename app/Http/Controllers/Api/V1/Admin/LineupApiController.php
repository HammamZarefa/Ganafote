<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLineupRequest;
use App\Http\Requests\UpdateLineupRequest;
use App\Http\Resources\Admin\LineupResource;
use App\Models\Lineup;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LineupApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('lineup_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new LineupResource(Lineup::with(['match', 'team', 'player', 'position'])->get());
    }

    public function store(StoreLineupRequest $request)
    {
        $lineup = Lineup::create($request->all());

        return (new LineupResource($lineup))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Lineup $lineup)
    {
        abort_if(Gate::denies('lineup_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new LineupResource($lineup->load(['match', 'team', 'player', 'position']));
    }

    public function update(UpdateLineupRequest $request, Lineup $lineup)
    {
        $lineup->update($request->all());

        return (new LineupResource($lineup))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Lineup $lineup)
    {
        abort_if(Gate::denies('lineup_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $lineup->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
