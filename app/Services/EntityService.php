<?php

namespace App\Services;

use App\DTO\CommentDTO;
use App\DTO\EntityDTO;
use App\Models\Entity;
use App\Repositories\EntityRepository;

class EntityService
{
    protected $entityRepository;

    public function __construct(EntityRepository $entityRepository)
    {
        $this->entityRepository = $entityRepository;
    }

    public function all()
    {
        return $this->entityRepository->all();
    }

    public function create(EntityDTO $dto)
    {
        // Create the entity and return it
        return $this->entityRepository->create($dto->toArray());
    }

    public function update(int $id, EntityDTO $dto)
    {
        // Find the entity by ID
        $entity = $this->entityRepository->find($id);
        if (!$entity) {
            throw new \Exception('Entity not found');
        }

        // Update the entity with the DTO data
        return $this->entityRepository->update($entity, $dto->toArray());
    }

    public function delete(int $id)
    {
        // Find the entity by ID
        $entity = $this->entityRepository->find($id);
        if (!$entity) {
            throw new \Exception('Entity not found');
        }

        // Delete the entity
        $this->entityRepository->delete($entity);
    }

    public function changeStatus(int $id, string $newStatus): Entity
    {
        $entity = Entity::findOrFail($id);
        $entity->status = $newStatus;
        $entity->save();

        return $entity;
    }

    public function changeType(int $id, string $newType): Entity
    {
        $entity = Entity::findOrFail($id);
        $entity->type = $newType;
        $entity->save();

        return $entity;
    }

    public function addComment(int $id, CommentDTO $commentDTO)
    {
        $entity = Entity::findOrFail($id);

        // Create the comment, ensuring entity_id is set correctly
        return $entity->comments()->create([
            'comment' => $commentDTO->comment,
            'parent_id' => $commentDTO->parentId,
            'entity_id' => $entity->id, // Make sure to set the entity_id
        ]);
    }

    public function find(int $id): Entity
    {
        return $this->entityRepository->find($id);
    }
}
