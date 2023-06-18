<?php

namespace App\Http\Controllers;

use App\Repositories\PostRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PostController extends Controller
{
    private $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function index(): JsonResponse
    {
        $posts = $this->postRepository->getAll();

        return response()->json($posts);
    }

    public function store(Request $request): JsonResponse
    {
        $postData = $request->all();
        $post = $this->postRepository->create($postData);

        return response()->json($post, 201);
    }

    public function edit($id): JsonResponse
    {
        $post = $this->postRepository->getById($id);

        return response()->json($post);
    }

    public function update(Request $request, $id): JsonResponse
    {
        $postData = $request->all();
        $post = $this->postRepository->getById($id);
        $post = $this->postRepository->update($post, $postData);

        return response()->json($post, 200);
    }

    public function destroy($id): JsonResponse
    {
        $post = $this->postRepository->getById($id);
        $this->postRepository->delete($post);

        return response()->json(null, 204);
    }
}
