<?php

namespace App\Http\Controllers;

use App\DTO\CommentDTO;
use App\Http\Requests\StoreCommentRequest;
use App\Services\CommentService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CommentController extends Controller
{
    protected $commentService;

    public function __construct(CommentService $commentService)
    {
        $this->commentService = $commentService;
    }

    public function store(StoreCommentRequest $request, int $entityId)
    {
        $validated = $request->validated(); // Get the validated data

        $validated['entity_id'] = $entityId;
        $commentDTO = new CommentDTO($validated);
        $comment = $this->commentService->addComment($commentDTO);

        return response()->json($comment, 201);
    }

    public function index(int $entityId)
    {
        $comments = $this->commentService->getCommentsByEntity($entityId);

        return response()->json($comments);
    }
}
