<?php

namespace App\Repositories;

use App\Models\Comment;

class CommentRepository
{
    public function create(array $data): Comment
    {
        return Comment::create($data);
    }

    public function find(int $id): ?Comment
    {
        return Comment::find($id);
    }

    public function update(Comment $comment, array $data): Comment
    {
        $comment->update($data);
        return $comment;
    }

    public function delete(Comment $comment): void
    {
        $comment->delete();
    }

    public function findByEntity(int $entityId)
    {
        return Comment::where('entity_id', $entityId)->get();
    }
}
