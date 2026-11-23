<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Media;
use App\Http\Resources\MediaResource;
use Illuminate\Http\Request;

class CollectionController extends Controller
{
    // Menampilkan koleksi milik user
    public function index(User $user)
    {
        $media = $user->media()->latest()->get();

        return MediaResource::collection($media);
    }

    // Menambahkan media ke koleksi user
    public function store(Request $request, User $user)
    {
        $request->validate([
            'media_id' => 'required|exists:media,id',
        ]);

        $user->media()->syncWithoutDetaching([$request->media_id]);

        return response()->json([
            'message' => 'Media added to collection successfully',
        ]);
    }

    // Menghapus media dari koleksi user
    public function destroy(User $user, Media $media)
    {
        $user->media()->detach($media->id);

        return response()->json([
            'message' => 'Media removed from collection successfully',
        ]);
    }
}
