<?php

namespace App\Http\Controllers;

use App\Repositories\TagRepository;
use App\Http\Requests\TagRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;

class TagController extends Controller
{
    private $tagRepository;

    public function __construct(TagRepository $tagRepository)
    {
        $this->tagRepository = $tagRepository;
    }

    public function index(): JsonResponse
    {
        $tags = $this->tagRepository->getAll();

        return response()->json($tags, 200);
    }

    public function store(TagRequest $request): JsonResponse
    {
        $tagData = $request->validated();
        $this->tagRepository->create($tagData);

        return response()->json($tagData, 201);
    }

    public function edit($id): JsonResponse
    {
        $tag = $this->tagRepository->getById($id);
        return response()->json($tag);
    }

    public function update(TagRequest $request, $id): JsonResponse
    {
        $tagData = $request->validated();
        $tag = $this->tagRepository->getById($id);
        $tag = $this->tagRepository->update($tag, $tagData);

        return response()->json($tag, 200);
    }

    public function destroy($id): JsonResponse
    {
        $tag = $this->tagRepository->getById($id);
        $this->tagRepository->delete($tag);

        return response()->json(null, 204);
    }
}
