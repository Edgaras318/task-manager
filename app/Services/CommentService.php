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
}
