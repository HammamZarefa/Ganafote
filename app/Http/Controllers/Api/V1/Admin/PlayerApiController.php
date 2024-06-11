<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StorePlayerRequest;
use App\Http\Requests\UpdatePlayerRequest;
use App\Http\Resources\Admin\PlayerResource;
use App\Models\Player;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PlayerApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('player_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PlayerResource(Player::with(['category', 'team', 'position', 'nationality'])->get());
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

        return (new PlayerResource($player))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Player $player)
    {
        abort_if(Gate::denies('player_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PlayerResource($player->load(['category', 'team', 'position', 'nationality']));
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

        return (new PlayerResource($player))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Player $player)
    {
        abort_if(Gate::denies('player_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $player->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
