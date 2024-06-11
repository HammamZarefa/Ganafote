<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyCategoryCompetitionRequest;
use App\Http\Requests\StoreCategoryCompetitionRequest;
use App\Http\Requests\UpdateCategoryCompetitionRequest;
use App\Models\Category;
use App\Models\CategoryCompetition;
use App\Models\Competition;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CategoryCompetitionController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('category_competition_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categoryCompetitions = CategoryCompetition::with(['category', 'competition'])->get();

        return view('admin.categoryCompetitions.index', compact('categoryCompetitions'));
    }

    public function create()
    {
        abort_if(Gate::denies('category_competition_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = Category::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $competitions = Competition::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.categoryCompetitions.create', compact('categories', 'competitions'));
    }

    public function store(StoreCategoryCompetitionRequest $request)
    {
        $categoryCompetition = CategoryCompetition::create($request->all());

        return redirect()->route('admin.category-competitions.index');
    }

    public function edit(CategoryCompetition $categoryCompetition)
    {
        abort_if(Gate::denies('category_competition_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = Category::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $competitions = Competition::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $categoryCompetition->load('category', 'competition');

        return view('admin.categoryCompetitions.edit', compact('categories', 'categoryCompetition', 'competitions'));
    }

    public function update(UpdateCategoryCompetitionRequest $request, CategoryCompetition $categoryCompetition)
    {
        $categoryCompetition->update($request->all());

        return redirect()->route('admin.category-competitions.index');
    }

    public function show(CategoryCompetition $categoryCompetition)
    {
        abort_if(Gate::denies('category_competition_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categoryCompetition->load('category', 'competition');

        return view('admin.categoryCompetitions.show', compact('categoryCompetition'));
    }

    public function destroy(CategoryCompetition $categoryCompetition)
    {
        abort_if(Gate::denies('category_competition_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categoryCompetition->delete();

        return back();
    }

    public function massDestroy(MassDestroyCategoryCompetitionRequest $request)
    {
        $categoryCompetitions = CategoryCompetition::find(request('ids'));

        foreach ($categoryCompetitions as $categoryCompetition) {
            $categoryCompetition->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
