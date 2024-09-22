<?php

namespace App\DTO;

class CommentDTO
{
    public int $entityId;
    public string $comment;
    public ?int $parentId;

    public function __construct(array $data)
    {
        $this->entityId = $data['entity_id'];
        $this->comment = $data['comment'];
        $this->parentId = $data['parent_id'] ?? null;
    }

    public function toArray(): array
    {
        return [
            'entity_id' => $this->entityId,
            'comment' => $this->comment,
            'parent_id' => $this->parentId,
        ];
    }
}
