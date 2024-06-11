<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyPlayerRequest;
use App\Http\Requests\StorePlayerRequest;
use App\Http\Requests\UpdatePlayerRequest;
use App\Models\Category;
use App\Models\Country;
use App\Models\Player;
use App\Models\Position;
use App\Models\Team;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class PlayerController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('player_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Player::with(['category', 'team', 'position', 'nationality'])->select(sprintf('%s.*', (new Player)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'player_show';
                $editGate      = 'player_edit';
                $deleteGate    = 'player_delete';
                $crudRoutePart = 'players';

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
            $table->editColumn('full_name', function ($row) {
                return $row->full_name ? $row->full_name : '';
            });
            $table->editColumn('number', function ($row) {
                return $row->number ? $row->number : '';
            });
            $table->editColumn('age', function ($row) {
                return $row->age ? $row->age : '';
            });
            $table->addColumn('category_name', function ($row) {
                return $row->category ? $row->category->name : '';
            });

            $table->addColumn('team_name', function ($row) {
                return $row->team ? $row->team->name : '';
            });

            $table->addColumn('position_name', function ($row) {
                return $row->position ? $row->position->name : '';
            });

            $table->editColumn('image', function ($row) {
                if ($photo = $row->image) {
                    return sprintf(
                        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
                        $photo->url,
                        $photo->thumbnail
                    );
                }

                return '';
            });
            $table->editColumn('is_starter', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->is_starter ? 'checked' : null) . '>';
            });
            $table->editColumn('height', function ($row) {
                return $row->height ? $row->height : '';
            });
            $table->editColumn('weight', function ($row) {
                return $row->weight ? $row->weight : '';
            });
            $table->addColumn('nationality_nationality', function ($row) {
                return $row->nationality ? $row->nationality->nationality : '';
            });

            $table->editColumn('nationality.nationality', function ($row) {
                return $row->nationality ? (is_string($row->nationality) ? $row->nationality : $row->nationality->nationality) : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'category', 'team', 'position', 'image', 'is_starter', 'nationality']);

            return $table->make(true);
        }

        $categories = Category::get();
        $teams      = Team::get();
        $positions  = Position::get();
        $countries  = Country::get();

        return view('admin.players.index', compact('categories', 'teams', 'positions', 'countries'));
    }

    public function create()
    {
        abort_if(Gate::denies('player_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = Category::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $teams = Team::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $positions = Position::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $nationalities = Country::pluck('nationality', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.players.create', compact('categories', 'nationalities', 'positions', 'teams'));
    }

    public function store(StorePlayerRequest $request)
    {
        $player = Player::create($request->all());

        if ($request->input('image', false)) {
            $player->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        foreach ($request->input('certificate', []) as $file) {
            $player->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('certificate');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $player->id]);
        }

        return redirect()->route('admin.players.index');
    }

    public function edit(Player $player)
    {
        abort_if(Gate::denies('player_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = Category::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $teams = Team::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $positions = Position::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $nationalities = Country::pluck('nationality', 'id')->prepend(trans('global.pleaseSelect'), '');

        $player->load('category', 'team', 'position', 'nationality');

        return view('admin.players.edit', compact('categories', 'nationalities', 'player', 'positions', 'teams'));
    }

    public function update(UpdatePlayerRequest $request, Player $player)
    {
        $player->update($request->all());

        if ($request->input('image', false)) {
            if (! $player->image || $request->input('image') !== $player->image->file_name) {
                if ($player->image) {
                    $player->image->delete();
                }
                $player->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($player->image) {
            $player->image->delete();
        }

        if (count($player->certificate) > 0) {
            foreach ($player->certificate as $media) {
                if (! in_array($media->file_name, $request->input('certificate', []))) {
                    $media->delete();
                }
            }
        }
        $media = $player->certificate->pluck('file_name')->toArray();
        foreach ($request->input('certificate', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $player->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('certificate');
            }
        }

        return redirect()->route('admin.players.index');
    }

    public function show(Player $player)
    {
        abort_if(Gate::denies('player_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $player->load('category', 'team', 'position', 'nationality');

        return view('admin.players.show', compact('player'));
    }

    public function destroy(Player $player)
    {
        abort_if(Gate::denies('player_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $player->delete();

        return back();
    }

    public function massDestroy(MassDestroyPlayerRequest $request)
    {
        $players = Player::find(request('ids'));

        foreach ($players as $player) {
            $player->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('player_create') && Gate::denies('player_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Player();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
