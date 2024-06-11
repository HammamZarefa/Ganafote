<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMatchEventRequest;
use App\Http\Requests\UpdateMatchEventRequest;
use App\Http\Resources\Admin\MatchEventResource;
use App\Models\MatchEvent;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MatchEventApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('match_event_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MatchEventResource(MatchEvent::with(['match', 'team', 'player'])->get());
    }

    public function store(StoreMatchEventRequest $request)
    {
        $matchEvent = MatchEvent::create($request->all());

        return (new MatchEventResource($matchEvent))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(MatchEvent $matchEvent)
    {
        abort_if(Gate::denies('match_event_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MatchEventResource($matchEvent->load(['match', 'team', 'player']));
    }

    public function update(UpdateMatchEventRequest $request, MatchEvent $matchEvent)
    {
        $matchEvent->update($request->all());

        return (new MatchEventResource($matchEvent))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(MatchEvent $matchEvent)
    {
        abort_if(Gate::denies('match_event_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $matchEvent->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
