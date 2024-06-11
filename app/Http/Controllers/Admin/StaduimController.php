<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyStaduimRequest;
use App\Http\Requests\StoreStaduimRequest;
use App\Http\Requests\UpdateStaduimRequest;
use App\Models\Staduim;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class StaduimController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('staduim_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Staduim::query()->select(sprintf('%s.*', (new Staduim)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'staduim_show';
                $editGate      = 'staduim_edit';
                $deleteGate    = 'staduim_delete';
                $crudRoutePart = 'staduims';

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
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('address', function ($row) {
                return $row->address ? $row->address : '';
            });
            $table->editColumn('city', function ($row) {
                return $row->city ? $row->city : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.staduims.index');
    }

    public function create()
    {
        abort_if(Gate::denies('staduim_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.staduims.create');
    }

    public function store(StoreStaduimRequest $request)
    {
        $staduim = Staduim::create($request->all());

        return redirect()->route('admin.staduims.index');
    }

    public function edit(Staduim $staduim)
    {
        abort_if(Gate::denies('staduim_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.staduims.edit', compact('staduim'));
    }

    public function update(UpdateStaduimRequest $request, Staduim $staduim)
    {
        $staduim->update($request->all());

        return redirect()->route('admin.staduims.index');
    }

    public function show(Staduim $staduim)
    {
        abort_if(Gate::denies('staduim_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $staduim->load('stadiumMatches');

        return view('admin.staduims.show', compact('staduim'));
    }

    public function destroy(Staduim $staduim)
    {
        abort_if(Gate::denies('staduim_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $staduim->delete();

        return back();
    }

    public function massDestroy(MassDestroyStaduimRequest $request)
    {
        $staduims = Staduim::find(request('ids'));

        foreach ($staduims as $staduim) {
            $staduim->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
