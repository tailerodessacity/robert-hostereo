<?php

namespace App\Http\Controllers;

use App\Models\PostTranslation;
use App\Http\Requests\StorePostTranslationRequest;
use App\Http\Requests\UpdatePostTranslationRequest;
use Illuminate\Http\JsonResponse;

class PostTranslationController
{
    public function index()
    {
        $postTranslations = PostTranslation::all();
        return response()->json($postTranslations);
    }

    public function store(StorePostTranslationRequest $request): JsonResponse
    {
        $postTranslation = PostTranslation::create($request->validated());
        return response()->json($postTranslation, 201);
    }

    public function edit($id)
    {
        $postTranslation = PostTranslation::findOrFail($id);
        return response()->json($postTranslation);
    }

    public function update(UpdatePostTranslationRequest $request, $id): JsonResponse
    {
        $postTranslation = PostTranslation::findOrFail($id);
        $postTranslation->update($request->validated());

        return response()->json($postTranslation, 200);
    }

    public function destroy($id): JsonResponse
    {
        $postTranslation = PostTranslation::findOrFail($id);
        $postTranslation->delete();

        return response()->json(null, 204);
    }
}
