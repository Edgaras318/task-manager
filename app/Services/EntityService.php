<?php

namespace App\Services;

use App\DTO\CommentDTO;
use App\DTO\EntityDTO;
use App\Models\Entity;
use App\Repositories\EntityRepository;
use Illuminate\Contracts\Queue\EntityNotFoundException;
use Illuminate\Support\Collection;

class EntityService
{
    protected $entityRepository;

    public function __construct(EntityRepository $entityRepository)
    {
        $this->entityRepository = $entityRepository;
    }

    public function all(): Collection
    {
        return $this->entityRepository->all();
    }

    public function create(EntityDTO $dto): Entity
    {
        // Create the entity and return it
        return $this->entityRepository->create($dto->toArray());
    }

    public function update(int $id, EntityDTO $dto): Entity
    {
        // Find the entity by ID
        $entity = $this->entityRepository->find($id);
        if (!$entity) {
            throw new EntityNotFoundException("Entity not found");
        }

        // Update the entity with the DTO data
        return $this->entityRepository->update($entity, $dto->toArray());
    }

    public function delete(int $id): void
    {
        // Find the entity by ID
        $entity = $this->entityRepository->find($id);
        if (!$entity) {
            throw new EntityNotFoundException("Entity not found");
        }

        // Delete the entity
        $this->entityRepository->delete($entity);
    }

    public function changeAttribute(int $id, string $attribute, string $value): Entity
    {
        $entity = Entity::findOrFail($id);
        $entity->{$attribute} = $value;
        $entity->save();

        return $entity;
    }

    public function addComment(int $id, CommentDTO $commentDTO): Entity
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
