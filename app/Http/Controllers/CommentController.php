<?php

namespace App\Http\Controllers;

use App\DTO\CommentDTO;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Services\CommentService;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;

class CommentController extends Controller
{
    protected $commentService;

    public function __construct(CommentService $commentService)
    {
        $this->commentService = $commentService;
    }

    // Store a new comment
    public function store(StoreCommentRequest $request, int $entityId): JsonResponse
    {
        $validated = $request->validated();
        $validated['entity_id'] = $entityId;

        $commentDTO = new CommentDTO($validated);
        $comment = $this->commentService->addComment($commentDTO);

        return response()->json($comment, 201);
    }

    // Get all comments for a specific entity
    public function index(int $entityId): JsonResponse
    {
        $comments = $this->commentService->getCommentsByEntity($entityId);
        return response()->json($comments);
    }

    // Update a specific comment
    public function update(UpdateCommentRequest $request, int $entityId, int $id): JsonResponse
    {
        $validated = $request->validated();
        $validated['entity_id'] = $entityId; // Ensure entity ID is updated

        $commentDTO = new CommentDTO($validated);
        $comment = $this->commentService->updateComment($id, $commentDTO);

        return response()->json($comment, 200);
    }

    // Soft delete a specific comment
    public function destroy(int $id): JsonResponse
    {
        $this->commentService->deleteComment($id);

        return response()->json(['message' => 'Comment deleted successfully'], 200);
    }
}
