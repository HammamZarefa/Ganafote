<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePenlityRequest;
use App\Http\Requests\UpdatePenlityRequest;
use App\Http\Resources\Admin\PenlityResource;
use App\Models\Penlity;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PenlityApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('penlity_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PenlityResource(Penlity::with(['match', 'team', 'player'])->get());
    }

    public function store(StorePenlityRequest $request)
    {
        $penlity = Penlity::create($request->all());

        return (new PenlityResource($penlity))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Penlity $penlity)
    {
        abort_if(Gate::denies('penlity_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PenlityResource($penlity->load(['match', 'team', 'player']));
    }

    public function update(UpdatePenlityRequest $request, Penlity $penlity)
    {
        $penlity->update($request->all());

        return (new PenlityResource($penlity))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Penlity $penlity)
    {
        abort_if(Gate::denies('penlity_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $penlity->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
