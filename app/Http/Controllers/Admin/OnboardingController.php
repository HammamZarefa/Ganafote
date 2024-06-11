<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyOnboardingRequest;
use App\Http\Requests\StoreOnboardingRequest;
use App\Http\Requests\UpdateOnboardingRequest;
use App\Models\Onboarding;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OnboardingController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('onboarding_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $onboardings = Onboarding::all();

        return view('admin.onboardings.index', compact('onboardings'));
    }

    public function create()
    {
        abort_if(Gate::denies('onboarding_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.onboardings.create');
    }

    public function store(StoreOnboardingRequest $request)
    {
        $onboarding = Onboarding::create($request->all());

        return redirect()->route('admin.onboardings.index');
    }

    public function edit(Onboarding $onboarding)
    {
        abort_if(Gate::denies('onboarding_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.onboardings.edit', compact('onboarding'));
    }

    public function update(UpdateOnboardingRequest $request, Onboarding $onboarding)
    {
        $onboarding->update($request->all());

        return redirect()->route('admin.onboardings.index');
    }

    public function show(Onboarding $onboarding)
    {
        abort_if(Gate::denies('onboarding_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.onboardings.show', compact('onboarding'));
    }

    public function destroy(Onboarding $onboarding)
    {
        abort_if(Gate::denies('onboarding_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $onboarding->delete();

        return back();
    }

    public function massDestroy(MassDestroyOnboardingRequest $request)
    {
        $onboardings = Onboarding::find(request('ids'));

        foreach ($onboardings as $onboarding) {
            $onboarding->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
