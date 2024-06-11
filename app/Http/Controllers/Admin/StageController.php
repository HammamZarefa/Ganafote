<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyStageRequest;
use App\Http\Requests\StoreStageRequest;
use App\Http\Requests\UpdateStageRequest;
use App\Models\Stage;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StageController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('stage_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stages = Stage::all();

        return view('admin.stages.index', compact('stages'));
    }

    public function create()
    {
        abort_if(Gate::denies('stage_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.stages.create');
    }

    public function store(StoreStageRequest $request)
    {
        $stage = Stage::create($request->all());

        return redirect()->route('admin.stages.index');
    }

    public function edit(Stage $stage)
    {
        abort_if(Gate::denies('stage_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.stages.edit', compact('stage'));
    }

    public function update(UpdateStageRequest $request, Stage $stage)
    {
        $stage->update($request->all());

        return redirect()->route('admin.stages.index');
    }

    public function show(Stage $stage)
    {
        abort_if(Gate::denies('stage_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.stages.show', compact('stage'));
    }

    public function destroy(Stage $stage)
    {
        abort_if(Gate::denies('stage_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stage->delete();

        return back();
    }

    public function massDestroy(MassDestroyStageRequest $request)
    {
        $stages = Stage::find(request('ids'));

        foreach ($stages as $stage) {
            $stage->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
