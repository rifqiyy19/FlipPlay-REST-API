<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Media;
use App\Http\Resources\MediaResource;
use App\Http\Requests\StoreMediaRequest;
use App\Http\Requests\UpdateMediaRequest;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $media = Media::latest()->get();

        return MediaResource::collection($media);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMediaRequest $request)
    {
        $media = Media::create($request->validated());

        return new MediaResource($media);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $media = Media::with('users')->findOrFail($id);

        return new MediaResource($media);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMediaRequest $request, string $id)
    {
        $media = Media::findOrFail($id);

        $media->update($request->validated());

        return new MediaResource($media);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $media = Media::findOrFail($id);

        $media->delete();

        return response()->json([
        'message' => 'Media deleted successfully',
        ]);
    }
}
