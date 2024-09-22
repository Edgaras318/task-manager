<?php

namespace App\Services;

use App\DTO\CommentDTO;
use App\Repositories\CommentRepository;

class CommentService
{
    protected $commentRepository;

    public function __construct(CommentRepository $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    public function addComment(CommentDTO $dto)
    {
        return $this->commentRepository->create($dto->toArray());
    }

    public function getCommentsByEntity(int $entityId)
    {
        return $this->commentRepository->findByEntity($entityId);
    }

    public function updateComment(int $id, CommentDTO $dto)
    {
        $comment = $this->commentRepository->find($id);
        if ($comment) {
            return $this->commentRepository->update($comment, $dto->toArray());
        }

        // Handle case where the comment is not found
        throw new \Exception("Comment not found");
    }

    public function deleteComment(int $id): void
    {
        $comment = $this->commentRepository->find($id);
        if ($comment) {
            $this->commentRepository->delete($comment);
        } else {
            // Handle case where the comment is not found
            throw new \Exception("Comment not found");
        }
    }
}
